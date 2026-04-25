<?php

namespace App\Http\Controllers;

use App\Models\Menu; // Import Model
use App\Models\Kategori; // Import Model
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::with('kategori')->get();
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
    public function tambahKategori()
    {
        return view('page.menu.tambah-kategori');
    }

    // menambah menu

    public function simpanMenu(Request $request)
    {
        // Sesuaikan validasi dengan nama atribut name di tag <input> HTML
        // 1. Jalankan Validasi
        $request->validate(
            [
                'nama_menu' => 'required|string|max:50',
                'harga_menu' => 'required|numeric|min:0',
                'kategori_menu' => 'required|exists:tbl_kategori,id',
                'foto' => 'required|image|mimes:jpg,png,jpeg|max:2000',
            ],
            [
                'nama_menu.required' => 'Nama menu jangan kosong!',
                'harga_menu.required' => 'Harga menu jangan kosong!',
                'kategori_menu.required' => 'Pilih kategori terlebih dahulu!',
                'foto.required' => 'Wajib mengupload foto!',
                'foto.mimes' => 'Foto hanya boleh jpg, png, jpeg',
                'foto.max' => 'Ukuran foto maksimal 2MB',
            ],
        );

        // 2. Jika validasi lolos, baru buat nama file

        $namaFile = Str::random(5) . '.' . $request->foto->extension();
        $request->foto->move(public_path('gambar_menu'),$namaFile);

        // dd($namaFile);

        // 3. Lanjutkan proses simpan (Contoh)
        // $request->foto->move(public_path('images'), $namaFile);

        // Sesuaikan key (kiri) dengan kolom database, value (kanan) dengan input form
        menu::create([
            'nm_produk' => $request->nama_menu,
            'harga' => $request->harga_menu,
            'foto'=> $namaFile,
            'id_kategori' => $request->kategori_menu,
        ]);

        return redirect('/menu')->with('success', 'Menu berhasil ditambahkan!');
    }

    // menambah kategori

    public function simpanKategori(Request $request)
    {
        $request->validate(
            [
                'nama_kategori' => 'required|max:50',
                'keterangan_kategori' => 'required|max:255',
            ],
            [
                'nama_kategori.required' => 'masukan nama kategori!',
            ],
        );

        Kategori::create([
            'nm_kategori' => $request->nama_kategori,
            'keterangan_kategori' => $request->keterangan_kategori,
        ]);

        return redirect('/kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function detail($id)
    {
        // dd($id);
        $data = menu::findOrFail($id);

        // dd($data);

        return view('page.menu.detail', ['menu' => $data]);
    }
    public function kategoriDetail($id)
    {
        // dd($id);
        $data = kategori::findOrFail($id);

        // dd($data);

        return view('page.menu.detail-kategori', ['menu' => $data]);
    }

    public function editKatgeori($id)
    {
        $data = kategori::findOrFail($id);
        // dd($data);
        return view('page.menu.edit-kategori', ['data' => $data]);
    }

    public function updateKategori($id, Request $request)
    {
        // dd('berhasil menyimpan data');

        $request->validate(
            [
                'nama_kategori_update' => 'required|max:50',
            ],
            [
                'nama_kategori_update.required' => 'Nama kategori tidak boleh kosong!',
            ],
        );

        Kategori::where('id', $id)->update([
            'nm_kategori' => $request->nama_kategori_update,
            'keterangan_kategori' => $request->keterangan_kategori_update,
        ]);

        return redirect('/kategori')->with('success', 'Data berhasil diupdate');
    }

    public function editMenu($id)
    {
        $data = menu::findOrFail($id);

        // dd($data);

        return view('page.menu.edit-menu', ['data' => $data]);
    }

    public function updateMenu($id, Request $request)
    {
        $request->validate(
            [
                'nama_menu_update' => 'required|max:50',
                'harga_menu_update' => 'required',
            ],
            [
                'nama_menu_update.required' => 'Nama menu tidak boleh kosong!',
                'harga_menu_update.required' => 'Harga menu tidak boleh kosong!',
            ],
        );

        menu::where('id', $id)->update([
            'nm_produk' => $request->nama_menu_update,
            'harga' => $request->harga_menu_update,
        ]);

        return redirect('/menu')->with('success', 'Menu berhasil diupdate');
    }

  public function destroy($id)
{
    // Cari data berdasarkan ID
    $menu = Menu::findOrFail($id);



    // Hapus file gambar jika ada
    if ($menu->foto) {
        $imagePath = public_path('gambar_menu/'.$menu->foto);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Hapus data dari database
    $menu->delete();

    // Kembalikan ke halaman sebelumnya dengan pesan sukses
    return redirect()->back()->with('success', 'Menu berhasil dihapus!');
}

    public function destroyKategori($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
    }
}
