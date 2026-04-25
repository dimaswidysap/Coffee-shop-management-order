@extends('layout.masterTransaksi')

@section('transaksi')

<section class="w-full">

    <section class="w-full flex flex-wrap py-10 justify-center gap-3">

        @foreach ($menu as $item)
    <button type="button" class="inline-flex flex-col items-center cursor-pointer gap-2">
        {{-- Kotak Gambar/Placeholder --}}
        <div class="w-[13rem]! md:w-[10rem]! aspect-square bg-background-second p-2 rounded-xl shadow-2xl!">
            <img src={{ asset('gambar_menu/'. $item->foto) }} alt="foto menu" class="w-full h-full bg-foreground rounded-md object-cover overflow-hidden">
        </div>

        {{-- Teks Menu --}}
        <span class="w-[13rem]! md:w-[10rem]! h-[5rem] text-2xl inline-flex items-center justify-center font-semibold text-white">
            {{ $item->nm_produk }}
        </span>
    </button>
@endforeach

    </section>
</section>

@endsection
