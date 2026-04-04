<?php

namespace App\Http\Controllers;

use App\Models\Menu; // Import Model
use App\Models\Kategori; // Import Model
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menu =Menu::all();
        return view('page.menu.menu', compact('menu'));

    }

    public function kategori(){
         $kategori =Kategori::all();
        //  dd($kategori);
        return view('page.menu.kategori',compact('kategori'));
    }

    public function createMenu(){}
}

