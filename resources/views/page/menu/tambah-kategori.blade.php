@extends('layout.master')


@section('konten')
    <section class="w-full pr-4 md:pl-[13rem] lg:pl-[16rem]">
        <section class="w-full flex flex-col gap-5">
            <h3 class="font-black text-4xl font-dark">Tambah Kategori</h3>
            <div class="w-full">
                <form action="/kategori/simpan" method="POST" class="flex flex-wrap">
                    @csrf
                    <div class="flex flex-col w-full px-2">
                        <label class="font-black font-dark" for="">Masukan Nama Kategori</label>
                        <input name="nama_kategori"
                            class="background-secondary py-1 px-0.5 shadow-md rounded-md font-medium text-sm"
                            type="text">
                        @error('nama_kategori')
                            <span class="text-red-500 text-xs mt-1 font-semibold">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full px-2 mt-4">
                        <label class="font-black font-dark" for="">Masukan Deskripsi Kategori</label>
                        <textarea name="keterangan_kategori" id="" cols="30" rows="10"
                            class="background-secondary h-[5rem] py-1 px-0.5 shadow-md rounded-md font-medium text-sm"></textarea>
                    </div>
                    <div class="flex flex-col w-full px-2 mt-6">
                        <button type="submit" class="w-full bg-green-400 py-2 rounded-md shadow-md cursor-pointer">
                            <span class="font-black font-dark">Tambahkan Kategori</span>
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </section>
@endsection
