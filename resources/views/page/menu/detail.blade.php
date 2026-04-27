@extends('layout.master')

@section('konten')
    <section class="w-full md:pl-[13rem] lg:pl-[16rem] pr-4 flex justify-end">
        <section class="pb-[10rem]  w-full max-w-7xl">
            <h1 class="py-12 text-3xl font-black text-foreground">Detail Menu</h1>

            <section class="w-full flex flex-col gap-4">
                @php
                    // Memetakan label UI ke properti database
                    $details = [
                        'Nama Menu'   => $menu->nm_produk,
                        'ID Menu'     => $menu->id,
                        'ID Kategori' => $menu->id_kategori,
                        'Harga'       => 'Rp ' . number_format($menu->harga, 0, ',', '.'),
                        'Foto'=> $menu->foto,
                        'Created At'  => $menu->created_at->format('d M Y H:i'),
                        'Updated At'  => $menu->updated_at->format('d M Y H:i'),
                    ];
                @endphp

                <figure class="w-[15rem] aspect-square bg-background-second shadow-md rounded-md p-1.5 overflow-hidden">
                    <div class="w-full h-full bg-foreground rounded-sm overflow-hidden">
                        <img src={{ asset('gambar_menu/'.$menu->foto) }} alt="gambar-produk" class='object-center'>
                    </div>
                </figure>

                @foreach ($details as $label => $value)
                    <div class="w-full flex gap-4">
                        <div class="w-1/2 px-3">
                            <span class="inline-flex bg-background-second px-1 w-full py-2 shadow-sm text-foreground font-bold rounded-md">
                                {{ $label }}
                            </span>
                        </div>
                        <div class="w-1/2 px-3">
                            <span class="inline-flex bg-background-second px-1 w-full py-2 shadow-sm text-foreground font-bold rounded-md ">
                                {{ $value }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </section>

            <div class="mt-8 px-3">
                <a href="/menu" class="bg-background-second text-foreground px-6 py-2 rounded-md font-bold shadow-md  transition-all">
                    Kembali
                </a>
            </div>
        </section>
    </section>
@endsection
