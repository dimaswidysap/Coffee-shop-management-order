@extends('layout.master')


@section('konten')
    <section class="w-full md:pl-[13rem] lg:pl-[16rem] pr-4 flex justify-end">
        <section class="h-52 w-full max-w-7xl">
            <h1 class="py-12 text-3xl font-black font-dark">Detail Kategori</h1>

            <section class="w-full flex flex-col gap-4">
                @php
                    // Memetakan label UI ke properti database
                    $details = [
                        'Nama Kategori' => $menu->nm_kategori,
                        'ID Kategori' => $menu->id,
                        'Created At' => $menu->created_at->format('d M Y H:i'),
                        'Updated At' => $menu->updated_at->format('d M Y H:i'),
                        'Deskripsi' => $menu->keterangan_kategori,
                    ];
                @endphp

                @foreach ($details as $label => $value)
                    <div class="w-full flex gap-4">
                        <div class="w-1/2 px-3">
                            <span
                                class="inline-flex background-secondary px-1 w-full py-2 shadow-sm font-dark font-bold rounded-md">
                                {{ $label }}
                            </span>
                        </div>
                        <div class="w-1/2 px-3">
                            <span
                                class="inline-flex background-secondary px-1 w-full py-2 shadow-sm font-dark font-bold rounded-md text-gray-600 break-all">
                                {{ $value }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </section>

            <div class="mt-8 px-3">
                <a href="/kategori" class="bg-green-400 font-dark px-6 py-2 rounded-md font-bold shadow-md  transition-all">
                    Kembali
                </a>
            </div>
        </section>
    @endsection
