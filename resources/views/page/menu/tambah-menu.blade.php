@extends('layout.master')


@section('konten')
    <section class="w-full pr-4 md:pl-[13rem] lg:pl-[16rem]">
        <section class="relative w-full flex flex-col gap-5 ">
            <a href="/menu"
                class="absolute inline-flex justify-center items-center h-10 rounded-full aspect-square bg-background-second shadow-md right-0">
                <span class="absolute w-[40%] h-1 rounded-md bg-foreground -rotate-45"></span>
                <span class="absolute w-[40%] h-1 rounded-md bg-foreground rotate-45"></span>
            </a>
            <h3 class="font-black text-4xl text-foreground">Tambah Produk</h3>
            <div class="w-full">
                <form action="/menu/simpan" method="POST" enctype="multipart/form-data" class="flex flex-wrap">
                    @csrf
                    <div class="flex flex-col w-1/2 px-2">
                        <label class="font-black text-foreground" for="">Masukan Nama Menu</label>
                        <input name="nama_menu"
                            class="bg-background-second text-foreground! py-1 px-2 shadow-md rounded-md font-medium text-sm"
                            type="text">
                        @error('nama_menu')
                            <span class="text-red-500 text-xs mt-1 font-semibold">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="flex flex-col w-1/2 px-2">
                        <label class="font-black text-foreground" for="">Masukan Harga Menu</label>
                        <input name="harga_menu"
                            class="bg-background-second text-foreground! py-1 px-2 shadow-md rounded-md font-medium text-sm"
                            type="number" min="0">
                        @error('harga_menu')
                            <span class="text-red-500 text-xs mt-1 font-semibold">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="flex flex-col w-1/2 px-2 mt-4">
                        <label class="font-black text-foreground" for="">Masukan Kategori Menu</label>
                        {{-- <input class="background-secondary py-1 px-0.5 shadow-md rounded-md font-medium text-sm" type="number"> --}}
                        <select name="kategori_menu"
                            class="bg-background-second text-foreground! py-1 px-2 shadow-md rounded-md font-medium text-sm"
                            id="">
                            <option value="" selected disabled class="text-foreground ">Pilih Kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nm_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_menu')
                            <span class="text-red-500 text-xs mt-1 font-semibold">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="relative flex justify-center items-center flex-col my-4 mx-2 rounded-md text-foreground h-[15rem] w-full bg-background-second outline-2 outline-foreground/20 p-2">
                        <label for="foto" class="absolute form-label mb-4">Foto Produk</label>
                        <input type="file" name="foto" class="form-control  h-full w-full" accept="image/*">
                        <small class="text-muted absolute mt-4">Format: jpg, jpeg, png. Maks: 2MB</small>
                         @error('foto')
                            <span class="text-red-500 text-xs mt-1 font-semibold">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full px-2 mt-6">
                        <button class="w-full bg-background-second py-2 rounded-md shadow-xl cursor-pointer">
                            <span class="font-black text-foreground">Tambahkan Menu</span>
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </section>
@endsection
