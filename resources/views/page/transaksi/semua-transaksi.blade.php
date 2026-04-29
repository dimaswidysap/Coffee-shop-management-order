@extends('layout.master')
@vite(['resources/js/semua-transaksi/semua-transaksi.js'])
@section('konten')
    <div class="w-full md:pl-[13rem] lg:pl-[16rem] pr-[1rem] pb-[10rem]">
        <h1 class="text-2xl font-bold mb-6">Riwayat Transaksi</h1>

        <div class="flex flex-col gap-4">

            @foreach ($transaksis as $transaksi)
                <section class="w-full bg-foreground/30 rounded-sm shadow-lg outline-2 outline-background-second/60">
                    <div class="w-full h-14 flex justify-center gap-2 items-center">
                        {{-- div kiri --}}
                        <div class="flex-1 flex p-1 h-full flex-col">
                            <span class="font-semibold text-lg text-background-second">
                                #{{ $transaksi->id }}
                            </span>
                            <span class="text-sm text-background-second/80 font-semibold">
                                {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d M Y H:i') }}
                            </span>
                        </div>
                        {{-- div tengah --}}
                        <div class="flex-1 h-full flex flex-col text-xs font-semibold">
                            @foreach ($transaksi->details->take(2) as $detail)
                                <span> {{ $detail->produk->nm_produk ?? 'Produk Dihapus' }}</span>
                            @endforeach

                            @if ($transaksi->details->count() > 2)
                                <span class="text-xs text-gray-400">
                                    +{{ $transaksi->details->count() - 2 }} item lainnya
                                </span>
                            @endif
                        </div>
                        {{-- div kanan --}}
                        <div class="flex-1 h-full flex justify-center items-center gap-4">
                            <span class="font-bold text-foreground">
                                Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                            </span>

                            {{-- UBAH ID MENJADI CLASS: btn-detail-transaksi --}}
                            <button
                                class="btn-detail-transaksi inline-flex bg-background-second shadow-md text-foreground! py-1 cursor-pointer px-2 rounded-md font-semibold">
                                <span>Detail</span>
                            </button>

                        </div>
                    </div>

                    {{-- UBAH ID MENJADI CLASS dan TAMBAHKAN 'hidden' --}}
                    <div class="detail-transaksi hidden w-full h-20 ">
                        {{-- Isi detail transaksi kamu di sini --}}
                    </div>
                </section>
            @endforeach

            @if ($transaksis->isEmpty())
                <div class="text-center text-gray-500 py-10">
                    <p>Belum ada transaksi.</p>
                </div>
            @endif

        </div>
    </div>
@endsection
