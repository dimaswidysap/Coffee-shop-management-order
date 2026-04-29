@php
    $isMenuActive = request()->is(['menu', 'tambah-menu', 'detail/*', 'menu/*/edit']);
    $isKategoriActive = request()->is(['kategori', 'tambah-kategori', 'detail-kategori/*', 'kategori/*/edit']);
    $isTransaksiActive = request()->is(['semua-transaksi']);
@endphp

<section class="fixed left-0 h-screen md:w-[12rem] lg:w-[15rem] z-100 bg-background-second inset-0 shadow-2xl">

    <div class="w-full h-[5rem] bg-red-700">
    </div>

    <nav class="mt-10">
        <ul class="flex flex-col gap-2 px-2 ">

            <li
                class="w-full transition-all duration-200 ease-in-out rounded-4xl group
               {{ $isMenuActive ? 'bg-background shadow-md' : 'hover:bg-background' }}">
                <a href="/menu" class="w-full flex pl-1 py-1 items-center gap-1">
                    <span class="inline-flex h-10 aspect-square p-1.5 bg-foreground rounded-full">
                        <img src="{{ asset('asset/icon/menu.svg') }}" alt="">
                    </span>
                    <span class="font-bold text-sm text-foreground ">Menu</span>
                </a>
            </li>

            <li
                class="w-full transition-all duration-200 ease-in-out rounded-4xl group
                 {{ $isKategoriActive ? 'bg-background shadow-md' : 'hover:bg-background' }}">
                <a href="/kategori" class="w-full flex pl-1 py-1 items-center gap-1">
                    <span class="inline-flex h-10 aspect-square p-1.5 bg-foreground rounded-full">
                        <img src="{{ asset('asset/icon/kategori.svg') }}" alt="">
                    </span>
                    <span class="font-bold text-sm text-foreground ">Kategori</span>
                </a>
            </li>

            <li
                class="w-full transition-all duration-200 ease-in-out rounded-4xl group
               {{ $isTransaksiActive ? 'bg-background shadow-md' : 'hover:bg-background' }}">
                <a href="/semua-transaksi" class="w-full flex pl-1 py-1 items-center gap-1">
                    <span class="inline-flex h-10 aspect-square p-1.5 bg-foreground rounded-full">
                        <img src="{{ asset('asset/icon/contract.svg') }}" alt="">
                    </span>
                    <span class="font-bold text-sm text-foreground ">Transaksi</span>
                </a>
            </li>

            <li
                class="w-full transition-all duration-200 ease-in-out rounded-4xl group
                {{ request()->is('user*') ? 'bg-background shadow-md' : 'hover:bg-background hover:shadow-md' }}">
                <a href="/user" class="w-full flex pl-1 py-1 items-center gap-1">
                    <span class="inline-flex h-10 aspect-square p-1.5 bg-foreground rounded-full">
                        <img src="{{ asset('asset/icon/user.svg') }}" alt="">
                    </span>
                    <span class="font-bold text-sm text-foreground ">User</span>
                </a>
            </li>

        </ul>
    </nav>

    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 mb-4 w-[90%]">
        <a href="/"
            class="w-full cursor-pointer justify-center py-2 inline-flex bg-red-700 rounded-md shadow-2xl">
            <span class="font-black text-foreground">Logout</span>
        </a>
    </div>

</section>
