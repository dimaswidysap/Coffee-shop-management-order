@extends('layout.master')

@section('konten')

<div class="w-full md:pl-[13rem] lg:pl-[16rem] pr-[1rem] pb-[10rem]">
    <h1 class="text-2xl font-bold mb-6">Riwayat Transaksi</h1>

    <div class="flex flex-col gap-4">

        @foreach($transaksis as $transaksi)
        <div class="bg-white shadow rounded-lg p-4 flex justify-between items-center">

            {{-- Kiri (Info Transaksi) --}}
            <div class="flex flex-col">
                <span class="font-semibold text-lg">
                    #{{ $transaksi->id }}
                </span>
                <span class="text-sm text-gray-500">
                    {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d M Y H:i') }}
                </span>
                <span class="text-xs text-gray-400 mt-1">
                    {{ $transaksi->details->count() }} item
                </span>
            </div>

            {{-- Tengah (Preview Item) --}}
            <div class="hidden md:flex flex-col text-sm text-gray-600">
                @foreach($transaksi->details->take(2) as $detail)
                    <span>• {{ $detail->produk->nm_produk ?? 'Produk Dihapus' }}</span>
                @endforeach

                @if($transaksi->details->count() > 2)
                    <span class="text-xs text-gray-400">
                        +{{ $transaksi->details->count() - 2 }} item lainnya
                    </span>
                @endif
            </div>

            {{-- Kanan (Total + Aksi) --}}
            <div class="flex flex-col items-end">
                <span class="font-bold text-green-600">
                    Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                </span>

                <a href="#" class="text-blue-500 text-sm mt-1 hover:underline">
                    Detail
                </a>
            </div>

        </div>
        @endforeach

        @if($transaksis->isEmpty())
        <div class="text-center text-gray-500 py-10">
            <p>Belum ada transaksi.</p>
        </div>
        @endif

    </div>
</div>

@endsection
