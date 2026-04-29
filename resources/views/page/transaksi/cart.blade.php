@php $total = 0; @endphp

@if (session('cart') && count(session('cart')) > 0)
    <div class="flex flex-col gap-2 h-full relative pb-24 overflow-y-auto">
        @foreach (session('cart') as $id => $details)
            @php $total += $details['harga'] * $details['quantity']; @endphp
            <div class="flex justify-between items-center rounded-md p-2 bg-background-second/50">
                <span class="text-foreground font-semibold text-sm md:text-base line-clamp-1 w-1/2">
                    {{ $details['name'] }}
                </span>
                <div class="flex items-center gap-4">
                    <span class="text-foreground font-medium">Qty: {{ $details['quantity'] }}</span>
                    <button type="button"
                        class="btn-decrease bg-red-600 hover:bg-red-700 text-white w-8 h-8 rounded-md flex justify-center items-center cursor-pointer transition-colors"
                        data-id="{{ $id }}">
                        -
                    </button>
                </div>
            </div>
        @endforeach

        <div
            class="w-full absolute bottom-0 bg-background py-0.5 px-0.5 rounded-md shadow-2xl outline-1 outline-foreground/30">

            <div class="p-1">
                <label class="text-foreground font-semibold pb-1 block" for="uang_pelanggan">
                    Masukan Uang Pelanggan
                </label>
                {{-- Tambahkan id="uang_pelanggan" --}}
                <input id="uang_pelanggan"
                    class="bg-background-second w-full py-3 px-1 rounded-md text-foreground! font-semibold!"
                    type="number" min="0" placeholder="0">
            </div>

            <span class="inline-flex w-full py-1 px-0.5 font-bold text-foreground">
                <p>Total :</p>
                {{-- Tambahkan data-total untuk dibaca JS --}}
                <p class="ml-2" id="total-harga" data-total="{{ $total }}">
                    Rp {{ number_format($total, 0, ',', '.') }}
                </p>
            </span>

            <button type="button" id="btn-checkout"
                class="w-full inline-flex justify-center items-center cursor-pointer bg-background-second rounded-md py-1.5">
                <span class="font-bold text-foreground">Lanjutkan Pembayaran</span>
            </button>
        </div>
    </div>
@else
    <p class="text-center text-foreground/70 mt-10">Belum ada item di nota.</p>
@endif
