@extends('layout.master')


@section('konten')
    <section class="w-full pr-4 md:pl-[13rem] lg:pl-[16rem]">
        <section class="w-full flex flex-col gap-5">
            <h3 class="font-black text-4xl font-dark">Tambah Produk</h3>
            <div class="w-full">
                <form action="" class="flex flex-wrap">
                    <div class="flex flex-col w-1/2 px-2">
                        <label class="font-black font-dark" for="">Masukan Nama Menu</label>
                        <input class="background-secondary py-1 px-0.5 shadow-md rounded-md font-medium text-sm"
                            type="text">
                    </div>
                    <div class="flex flex-col w-1/2 px-2">
                        <label class="font-black font-dark" for="">Masukan Harga Menu</label>
                        <input class="background-secondary py-1 px-0.5 shadow-md rounded-md font-medium text-sm"
                            type="number" min="0">
                    </div>
                    <div class="flex flex-col w-1/2 px-2 mt-4">
                        <label class="font-black font-dark" for="">Masukan Kategori Menu</label>
                        {{-- <input class="background-secondary py-1 px-0.5 shadow-md rounded-md font-medium text-sm" type="number"> --}}
                        <select class="background-secondary py-1 px-0.5 shadow-md rounded-md font-medium text-sm"
                            name="" id="">
                            <option value="" selected disabled>Pilih</option>
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Snack">Snack</option>
                        </select>
                    </div>
                    <div class="flex flex-col w-full px-2 mt-6">
                        <button class="w-full bg-green-400 py-2 rounded-md shadow-md cursor-pointer" >
                            <span class="font-black font-dark">Tambahkan Menu</span>
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </section>
@endsection
