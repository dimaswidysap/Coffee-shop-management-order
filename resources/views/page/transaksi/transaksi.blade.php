@extends('layout.masterTransaksi')
@extends('components.nav-kasir')
@vite('resources/js/semua-transaksi/sidebar.js')
@section('transaksi')
    {{-- Wajib ditambahkan untuk keamanan request Fetch API Laravel --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('page.transaksi.notifikasi-transaksi')

    <section class="w-full">
        <section id="sidebar-transaksi"
            class="-translate-x-full fixed z-10 w-1/4 left-0 h-full flex justify-center items-center bottom-0 ">
            <div class="w-full h-full bg-background-second shadow-2xl outline-2 outline-background-second/80 flex flex-col">
                <header class="w-full h-16 bg-background flex justify-between px-1 items-center shrink-0">
                    <h1 class="font-black text-foreground">NOTA</h1>
                    <div class="h-[90%] aspect-square rounded-full flex justify-center items-center">
                        <button id="btn-close-sidebar"
                            class="absolute cursor-pointer inline-flex justify-center items-center h-10 rounded-full aspect-square bg-background-second shadow-md">
                            <span class="absolute w-[40%] h-1 rounded-md bg-foreground -rotate-45"></span>
                            <span class="absolute w-[40%] h-1 rounded-md bg-foreground rotate-45"></span>
                        </button>
                    </div>
                </header>

                {{-- Container Cart yang akan diupdate oleh Javascript --}}
                <section class="flex-1 overflow-y-auto p-4" id="cart-container">
                    @include('page.transaksi.cart', ['cart' => session('cart', [])])
                </section>
            </div>
        </section>

        <section class="w-full flex flex-wrap py-10 justify-center gap-3 pb-[20rem] mt-[5rem]">
            @foreach ($menu as $item)
                {{-- Tambahkan class btn-add-cart dan data attributes --}}
                <button type="button" class="btn-add-cart group inline-flex flex-col items-center cursor-pointer gap-3"
                    data-id="{{ $item->id }}" data-name="{{ $item->nm_produk }}" data-price="{{ $item->harga }}">
                    <div
                        class="relative w-32 h-32 md:w-52 md:h-52 bg-background-second p-2 rounded-xl shadow-xl outline-1 outline-red-700/50">
                        <div class="w-full h-full overflow-hidden rounded-md bg-foreground">
                            <img loading="lazy" src="{{ asset('gambar_menu/' . $item->foto) }}" alt="{{ $item->nm_produk }}"
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                        </div>
                    </div>

                    <span
                        class="w-32 md:w-52 px-2 text-lg md:text-xl font-semibold text-white text-center line-clamp-2 leading-tight">
                        {{ $item->nm_produk }}
                    </span>
                </button>
            @endforeach
        </section>
    </section>
@endsection
