@extends('layout.master')

@section('konten')
    <section class="w-full md:pl-[13rem] lg:pl-[16rem] pr-4 flex justify-end">
        <section class="h-52 w-full max-w-7xl">
            <h1 class="py-12 text-3xl font-black font-dark">Edit Menu</h1>

            {{-- Pastikan action diarahkan ke route update dan tambahkan method PUT --}}
            <form class="w-full" action="/menu/{{ $data->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="flex flex-col mb-4">
                    <label for="nm_kategori" class="font-dark font-semibold">Edit Nama Menu</label>
                    <input type="text" id="" name="nama_menu_update"
                        value="{{ old('nm_menu', $data->nm_produk) }}"
                        class="background-secondary w-1/2 py-1.5 px-1 rounded-md shadow-ms">
                        @error('nama_menu_update')
                            <span class="text-red-500 text-xs mt-1 font-semibold">
                                 {{ $message }}
                            </span>
                        @enderror
                </div>
                <div class="flex flex-col mb-4">
                    <label for="nm_kategori" class="font-dark font-semibold">Edit Harga Menu</label>
                    <input type="text" id="" name="harga_menu_update"
                        value="{{ old('nm_menu', $data->harga) }}"
                        class="background-secondary w-1/2 py-1.5 px-1 rounded-md shadow-ms">
                        @error('harga_menu_update')
                            <span class="text-red-500 text-xs mt-1 font-semibold">
                                 {{ $message }}
                            </span>
                        @enderror
                </div>
                    <button
                    class="mt-4 px-4 py-2 bg-green-400 shadow-md font-black font-dark cursor-pointer rounded-md">Simpan
                    Perubahan</button>
            </form>
            <a href="/menu"
                class="inline-flex mt-5 px-4 py-2 bg-red-700 shadow-md font-black font-white cursor-pointer rounded-md">Batal</a>
        </section>
    </section>
@endsection
