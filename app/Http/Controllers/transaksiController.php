<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class transaksiController extends Controller
{
    //
    public function transaksi()
    {

        $menu = Menu::all();

        return view('page.transaksi.transaksi', compact('menu'));
    }
}
