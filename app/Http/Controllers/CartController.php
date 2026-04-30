<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
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
                'id' => $id,
                'name' => $request->name,
                'harga' => $request->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        // Mengembalikan tampilan komponen cart yang sudah diperbarui
        return view('page.transaksi.cart', compact('cart'))->render();
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart');

        if (! $cart) {
            return response()->json(['status' => 'error', 'message' => 'Cart kosong!'], 400);
        }

        $total_harga = 0;
        foreach ($cart as $item) {
            $total_harga += $item['harga'] * $item['quantity'];
        }

        // Ambil uang_pelanggan dari request
        $uang_pelanggan = $request->uang_pelanggan ?? 0;

        DB::beginTransaction();
        try {
            $id_transaksi = DB::table('tbl_transaksi')->insertGetId([
                'tanggal' => now(),
                'total_harga' => $total_harga,
                'uang_pelanggan' => $uang_pelanggan,          // ← tambahan
                'kembalian' => $uang_pelanggan - $total_harga, // ← opsional, bisa dihitung
                'created_at' => now(),
                'updated_at' => now(),
            ]);

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

            DB::commit();
            session()->forget('cart');

            return view('page.transaksi.cart')->render();

        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
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

        // dd($transaksis);

        return view('page.transaksi.semua-transaksi', compact('transaksis'));
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        if (! $transaksi) {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan');
        }

        $transaksi->delete();

        return redirect()->back()->with('success', 'Transaksi berhasil dihapus');
    }
}
