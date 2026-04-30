@extends('layout.master')
@vite(['resources/js/semua-transaksi/semua-transaksi.js'])
@section('konten')
    <div class="w-full md:pl-[13rem] lg:pl-[16rem] pr-[1rem] pb-[10rem]">
        <h1 class="text-2xl font-black mb-6 text-foreground">Riwayat Transaksi</h1>

        <div class="flex flex-col gap-4">

            @foreach ($transaksis as $transaksi)
                <section class="w-full bg-background-second rounded-sm shadow-lg outline-2 outline-background-second/60">
                    <div class="w-full h-14 flex justify-center gap-2 items-center">
                        {{-- div kiri --}}
                        <div class="flex-1 flex p-1 h-full flex-col">
                            <span class="font-semibold text-lg text-foreground/20">
                                #{{ $transaksi->id }}
                            </span>
                            <span class="text-sm text-foreground/80 font-semibold">
                                {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d M Y H:i') }}
                            </span>
                        </div>
                        {{-- div tengah --}}
                        <div class="flex-1 h-full flex flex-col text-xs font-semibold text-foreground">
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
                                class="btn-detail-transaksi inline-flex bg-foreground shadow-md text-background! py-1 cursor-pointer px-2 rounded-md font-semibold">
                                <span class="text-xs">Detail</span>
                            </button>

                        </div>
                    </div>


                    <div class="detail-transaksi hidden w-full p-1 flex">
                        <div class="w-1/2 h-full ">
                            <ul class="w-full flex flex-col">
                                @foreach ($transaksi->details as $detail)
                                    <li class="w-full flex  justify-between text-foreground">
                                        <div class="w-1/2 flex flex-col ">
                                            <span class="">{{ $detail->produk->nm_produk }}</span>
                                        </div>
                                        <div class="w-1/2 flex flex-col  ">
                                            <span
                                                class="">{{ number_format($detail->produk->harga, 0, ',', '.') }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <span class="w-[80%] inline-flex h-px bg-red-700 mt-2"></span>
                            <div class="w-full mt-2"><span class="text-foreground inline-flex w-1/2">Uang
                                    Pelanggan</span><span class="inline-flex w-1/2 text-foreground">Rp
                                    {{ number_format($transaksi->uang_pelanggan, 0, ',', '.') }}</span>
                            </div>
                            <div class="w-full "><span class="text-foreground inline-flex w-1/2">Harga</span><span
                                    class="inline-flex w-1/2 text-foreground">Rp
                                    {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
                            </div>
                            <div class="w-full mt-2"><span class="text-foreground inline-flex w-1/2">Kembalian
                                </span><span class="inline-flex w-1/2 text-foreground">Rp
                                    {{ number_format($transaksi->kembalian, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="flex-1 flex justify-center items-center">

                            <form action="/transaksi/{{ $transaksi->id }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-700 text-foreground! py-1 px-2 rounded  cursor-pointer text-sm! font-bold"><span>Hapus
                                        Transaksi</span></button>
                            </form>
                        </div>
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
