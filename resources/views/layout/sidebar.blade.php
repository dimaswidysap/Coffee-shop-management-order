<section class="fixed left-0 h-screen md:w-[12rem] lg:w-[15rem] z-100 background-secondary inset-0 shadow-2xl">

    <div class="w-full h-[5rem] bg-red-700">

    </div>

    <nav class="mt-10">
        <ul class="flex flex-col gap-2 px-2 ">
            <li class="w-full hover:bg-green-400 hover:shadow-md transition-all duration-200 ease-in-out rounded-4xl">
                <a href="/menu" class="w-full flex pl-1 py-1 items-center gap-1">
                    <span class="inline-flex h-10 aspect-square p-1.5 background-secondary rounded-full">
                        <img src="{{ asset('asset/icon/menu.svg') }}" alt="">
                    </span>
                    <span class="font-bold text-sm font-dark">Menu</span>
                </a>
            </li>
            <li class="w-full hover:bg-green-400 hover:shadow-md transition-all duration-200 ease-in-out rounded-4xl">
                <a href="/kategori" class="w-full flex pl-1 py-1 items-center gap-1">
                    <span class="inline-flex h-10 aspect-square p-1.5 background-secondary rounded-full">
                        <img src="{{ asset('asset/icon/kategori.svg') }}" alt="">
                    </span>
                    <span class="font-bold text-sm font-dark">Kategori</span>
                </a>
            </li>
            <li class="w-full hover:bg-green-400 hover:shadow-md transition-all duration-200 ease-in-out rounded-4xl">
                <a href="" class="w-full flex pl-1 py-1 items-center gap-1">
                    <span class="inline-flex h-10 aspect-square p-1.5 background-secondary rounded-full">
                        <img src="{{ asset('asset/icon/user.svg') }}" alt="">
                    </span>
                    <span class="font-bold text-sm font-dark">User</span>
                </a>
            </li>

        </ul>
    </nav>



    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 mb-4 w-[90%]">
        <button class="w-full cursor-pointer justify-center py-2 inline-flex bg-red-700 rounded-md shadow-2xl">
            <span class="font-black font-white">Logout</span>
        </button>
    </div>

</section>
