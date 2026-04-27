<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        // Mengembalikan tampilan komponen cart yang sudah diperbarui
        return view('page.transaksi.cart', compact('cart'))->render();
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
}
