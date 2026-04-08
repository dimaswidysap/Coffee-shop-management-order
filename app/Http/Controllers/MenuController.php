<?php

namespace App\Http\Controllers;

use App\Models\Menu; // Import Model
use App\Models\Kategori; // Import Model
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        // dd($menu);
        return view('page.menu.menu', compact('menu'));

    }

    public function kategori()
    {
        $kategori = Kategori::all();
        //  dd($kategori);
        return view('page.menu.kategori', compact('kategori'));
    }



    // nemampilkan halaman form menu

    public function tambahMenu()
    {
        // Mengambil semua data dari tabel tbl_kategori
        $kategori = Kategori::all();

        // Kirim data ke view menggunakan compact
        return view('page.menu.tambah-menu', compact('kategori'));
    }


    // nemampilkan halaman form kategroi
    public function tambahKategori() {
        return view('page.menu.tambah-kategori');
    }


    // menambah menu

    public function simpanMenu(Request $request)   {
        // Sesuaikan validasi dengan nama atribut name di tag <input> HTML
        $request->validate([
            'nama_menu' => 'required|string|max:50',
            'harga_menu' => 'required|numeric|min:0',
            'kategori_menu' => 'required|exists:tbl_kategori,id',
        ],[
            'nama_menu.required'=>'Nama menu jangan kosong!',
            'harga_menu.required'=>'Nama menu jangan kosong!',
            'kategori_menu.required'=>'Nama menu jangan kosong!',
        ]);

        // Sesuaikan key (kiri) dengan kolom database, value (kanan) dengan input form
        menu::create([
            'nm_produk' => $request->nama_menu,
            'harga' => $request->harga_menu,
            'id_kategori' => $request->kategori_menu,
        ]);

        return redirect('/menu')->with('success', 'Menu berhasil ditambahkan!');
    }


    // menambah kategori

    public function simpanKategori(Request $request) {
        $request->validate([
            'nama_kategori' => 'required|max:50',
            'keterangan_kategori' => 'required|max:255',
        ],[
            'nama_kategori.required'=> 'masukan nama kategori!'
        ]);

        Kategori::create([
            'nm_kategori' => $request->nama_kategori,
            'keterangan_kategori' => $request->keterangan_kategori,
        ]);

        return redirect('/kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }


    public function detail($id){
        // dd($id);
    $data = menu::findOrFail($id);

    // dd($data);

    return view('page.menu.detail',['menu'=>$data]);

    }
    public function kategoriDetail($id){
        // dd($id);
    $data = kategori::findOrFail($id);

    // dd($data);

    return view('page.menu.detail-kategori',['menu'=>$data]);

    }

    public function editKatgeori($id){
        $data = kategori::findOrFail($id);
        // dd($data);
    return view('page.menu.edit-kategori',['data'=>$data]);
    }

    public function updateKategori($id, Request $request ){

    // dd('berhasil menyimpan data');

     $request->validate([
            'nama_kategori_update' => 'required|max:50',
        ],[
            'nama_kategori_update.required'=> 'Nama kategori tidak boleh kosong!'
        ]);

        Kategori::where('id',$id)->update([
            'nm_kategori'=>$request->nama_kategori_update,
            'keterangan_kategori'=>$request ->keterangan_kategori_update
        ]);

        return redirect('/kategori')->with('success', 'Data berhasil diupdate');

    }
}
