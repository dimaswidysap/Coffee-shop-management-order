<nav class="w-full fixed z-10 top-0 inset-0 h-16 bg-background-second flex justify-between items-center">
    <section class="flex h-full items-center ml-[5%]">
        <button id="btn-sidebar-transaksi"
            class="bg-background shadow-2xl h-[70%] aspect-square rounded-full outline-1  flex justify-center items-center cursor-pointer">
            <img src="{{ asset('asset/icon/cart.svg') }}" alt="icon">
        </button>
    </section>

    <section class="h-full flex items-center">
        <a href="/" class="bg-red-700 inline-flex h-[50%] items-center gap-2 mr-4 p-2 rounded-md shadow-2xl">
            <span class="inline-flex h-full aspect-square">
                <img src={{ asset('asset/icon/logout.svg') }} alt="icon">
            </span>
            <span class="text-foreground font-semibold">Logout</span></a>
    </section>
</nav>
