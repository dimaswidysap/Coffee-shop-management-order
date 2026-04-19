@extends('layout.master')


@section('konten')
    <section class="w-full pr-4 md:pl-[13rem] lg:pl-[16rem]">
        <section class="relative w-full flex flex-col gap-5">
            <a href="/kategori"
                class="absolute inline-flex justify-center items-center h-10 rounded-full aspect-square bg-background-second shadow-md right-0">
                <span class="absolute w-[40%] h-1 rounded-md bg-foreground -rotate-45"></span>
                <span class="absolute w-[40%] h-1 rounded-md bg-foreground rotate-45"></span>
            </a>
            <h3 class="font-black text-4xl text-foreground">Tambah Kategori</h3>
            <div class="w-full">
                <form action="/kategori/simpan" method="POST" class="flex flex-wrap">
                    @csrf
                    <div class="flex flex-col w-full px-2">
                        <label class="font-black text-foreground" for="">Masukan Nama Kategori</label>
                        <input name="nama_kategori"
                            class="bg-background-second text-foreground! py-1 px-2 shadow-md rounded-md font-medium text-sm" type="text">
                        @error('nama_kategori')
                            <span class="text-red-500 text-xs mt-1 font-semibold">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full px-2 mt-4">
                        <label class="font-black text-foreground" for="">Masukan Deskripsi Kategori</label>
                        <textarea name="keterangan_kategori" id="" cols="30" rows="10"
                            class="bg-background-second h-[5rem] text-foreground! py-1 px-2 shadow-md rounded-md font-medium text-sm"></textarea>
                    </div>
                    <div class="flex flex-col w-full px-2 mt-6">
                        <button type="submit" class="w-full bg-background-second py-2 rounded-md shadow-xl cursor-pointer">
                            <span class="font-black text-foreground">Tambahkan Kategori</span>
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </section>
@endsection
