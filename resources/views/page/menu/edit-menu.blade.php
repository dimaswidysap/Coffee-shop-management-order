@extends('layout.master')

@section('konten')
    <section class="w-full md:pl-[13rem] lg:pl-[16rem] pr-4 flex justify-end">
        <section class="relative h-52 w-full max-w-7xl">
            <a href="/menu"
                class="absolute inline-flex justify-center items-center h-10 rounded-full aspect-square bg-background-second shadow-md right-0">
                <span class="absolute w-[40%] h-1 rounded-md bg-foreground -rotate-45"></span>
                <span class="absolute w-[40%] h-1 rounded-md bg-foreground rotate-45"></span>
            </a>
            <h1 class="pb-12 text-3xl font-black text-foreground">Edit Menu</h1>

            {{-- Pastikan action diarahkan ke route update dan tambahkan method PUT --}}
            <form class="w-full" action="/menu/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="flex gap-4 mb-3">
                    <figure class="relative w-[10rem] aspect-square bg-background-second rounded-md p-1.5">
                        <span class="absolute bottom-full font-black text-foreground">Foto saat ini.</span>
                        <div class="w-full h-full rounded-sm bg-foreground">
                            <img src={{ asset('gambar_menu/' . $data->foto) }} alt="foto menu">
                        </div>
                    </figure>
                    <div
                        class="relative w-[10rem] aspect-square bg-background-second rounded-md outline-1 outline-foreground/30 flex justify-center items-center">
                        <span class="absolute left-0 bottom-full font-black text-foreground w-[15rem]">Update foto
                            disini!</span>
                        <input type="file" name="update_foto"
                            class="w-full h-full form-control cursor-pointer text-foreground! p-2" accept="image/*">
                    </div>
                </div>

                <div class="flex flex-col mb-4">
                    <label for="nm_kategori" class="text-foreground font-semibold">Edit Nama Menu</label>
                    <input type="text" id="" name="nama_menu_update"
                        value="{{ old('nm_menu', $data->nm_produk) }}"
                        class="bg-background-second text-foreground! w-1/2 py-1.5 px-1 rounded-md shadow-ms">
                    @error('nama_menu_update')
                        <span class="text-red-500 text-xs mt-1 font-semibold">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="flex flex-col mb-4">
                    <label for="nm_kategori" class="text-foreground font-semibold">Edit Harga Menu</label>
                    <input type="text" id="" name="harga_menu_update" value="{{ old('nm_menu', $data->harga) }}"
                        class="bg-background-second text-foreground! w-1/2 py-1.5 px-1 rounded-md shadow-ms">
                    @error('harga_menu_update')
                        <span class="text-red-500 text-xs mt-1 font-semibold">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <button
                    class="mt-4 px-4 py-2 bg-background-second text-foreground! shadow-md font-black  cursor-pointer rounded-md">Simpan
                    Perubahan</button>
            </form>

        </section>
    </section>
@endsection
