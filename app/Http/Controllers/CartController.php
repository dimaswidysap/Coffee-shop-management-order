<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Menambahkan item ke cart
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->id;

        // Jika item sudah ada, tambah jumlahnya
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Jika belum ada, buat baru
            $cart[$id] = [
                "id" => $id,
                "name" => $request->name,
                "harga" => $request->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        // Mengembalikan tampilan komponen cart yang sudah diperbarui
        return view('page.transaksi.cart', compact('cart'))->render();
    }


    public function checkout(Request $request)
    {
        $cart = session()->get('cart');

        // Jika cart kosong, batalkan proses
        if (!$cart) {
            return response()->json(['status' => 'error', 'message' => 'Cart kosong!'], 400);
        }

        $total_harga = 0;
        foreach ($cart as $item) {
            $total_harga += $item['harga'] * $item['quantity'];
        }

        // Gunakan DB Transaction agar jika satu tabel gagal, semua dibatalkan
        DB::beginTransaction();
        try {
            // A. Insert ke tbl_transaksi dan ambil ID barunya
            // Sesuaikan nama kolom dengan yang ada di database Anda
            $id_transaksi = DB::table('tbl_transaksi')->insertGetId([
                'tanggal' => now(),
                'total_harga' => $total_harga,
                // 'id_user' => auth()->user()->id, // Opsional jika kasir harus login
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // B. Insert setiap item ke detail_transaksi
            $detail_data = [];
            foreach ($cart as $id => $item) {
                $detail_data[] = [
                    'id_transaksi' => $id_transaksi,
                    'id_produk' => $id,
                    'qty' => $item['quantity'],
                    'subtotal' => $item['harga'] * $item['quantity'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            DB::table('detail_transaksi')->insert($detail_data);

            DB::commit(); // Simpan permanen ke database

            // C. Kosongkan session cart setelah berhasil
            session()->forget('cart');

            // Kembalikan view cart yang sudah kosong
            return view('page.transaksi.cart')->render();

        } catch (\Exception $e) {
            DB::rollback(); // Batalkan insert jika ada error
            return response()->json(['status' => 'error', 'message' => 'Gagal menyimpan transaksi: ' . $e->getMessage()], 500);
        }
    }

    // Mengurangi item dari cart
    public function decrease(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->id;

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            } else {
                // Hapus item jika quantity mencapai 0
                unset($cart[$id]);
            }
        }

        session()->put('cart', $cart);

        return view('page.transaksi.cart', compact('cart'))->render();
    }

public function index()
{
    // Mengambil semua transaksi beserta detail dan produknya
    // latest('tanggal') akan mengurutkan dari transaksi paling baru
    $transaksis = Transaksi::with(['details.produk'])->latest('tanggal')->get();

    return view('page.transaksi.semua-transaksi', compact('transaksis'));
}
}
