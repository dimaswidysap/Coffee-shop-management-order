@if(session('cart') && count(session('cart')) > 0)
    <div class="flex flex-col gap-2 h-full relative">
        @foreach(session('cart') as $id => $details)
            <div class="flex justify-between items-center  rounded-md ">
                <span class="text-foreground font-semibold text-sm md:text-base line-clamp-1 w-1/2">
                    {{ $details['name'] }}
                </span>
                <div class="flex items-center gap-4">
                    <span class="text-foreground font-medium">Qty: {{ $details['quantity'] }}</span>
                    <button type="button" class="btn-decrease bg-red-600 hover:bg-red-700 text-white w-8 h-8 rounded-md flex justify-center items-center cursor-pointer transition-colors" data-id="{{ $id }}">
                        -
                    </button>
                </div>
            </div>
        @endforeach

        <div class="w-full absolute bottom-0 bg-background py-1.5 px-0.5 rounded-md shadow-2xl">
            <span class="inline-flex w-full py-1 px-0.5 font-bold text-foreground">
                <p>Total :</p>
                <p class="ml-2">20.000</p>
            </span>
            <button class="w-full inline-flex justify-center items-center bg-red-700 rounded-md py-1.5">
                <span class="font-bold text-foreground">Cetak NOTA</span>
            </button>
        </div>
    </div>
@else
    <p class="text-center text-foreground/70 mt-10">Belum ada item di nota.</p>
@endif
