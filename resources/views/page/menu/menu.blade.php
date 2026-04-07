@extends('layout.master')

@section('konten')
    <section class="w-full md:pl-[13rem] lg:pl-[16rem] pr-[1rem]">
        <section class="w-full flex gap-3 background-secondary rounded-md py-2.5 px-1.5 shadow-md">
            <a href="/tambah-menu"
                class="inline-flex gap-1 items-center h-10 bg-green-400 py-1 pl-1 pr-2 rounded-3xl hover:shadow-md transition-all duration-150 ease-in-out">
                <span class="flex justify-center items-center h-full aspect-square background-secondary rounded-full">
                    <img class="object-cover" src="{{ asset('asset/icon/add.svg') }}" alt="add-icon">
                </span>
                <span class="font-bold text-sm font-dark">Tambah Menu</span>
            </a>
            <a href=""
                class="inline-flex gap-1 items-center h-10 bg-green-400 py-1 p-3 rounded-3xl hover:shadow-md transition-all duration-150 ease-in-out">
                <span class="font-bold text-sm font-dark">Makanan</span>
            </a>
            <a href=""
                class="inline-flex gap-1 items-center h-10 bg-green-400 py-1 p-3 rounded-3xl hover:shadow-md transition-all duration-150 ease-in-out">
                <span class="font-bold text-sm font-dark">Minuman</span>
            </a>
        </section>
    </section>

    <section class="relative w-full h-screen flex justify-end">
        <section class="w-full md:ml-[13rem] lg:ml-[16rem] mr-[1rem] max-w-7xl p-4 my-1.5">
            <table class="w-full border-separate border-spacing-y-3">
                <thead>
                    <tr class="text-gray-500 uppercase text-xs tracking-wider">
                        <th class="w-12 text-left pb-2 pl-4 font-semibold">NO</th>
                        <th class="w-32 text-left pb-2 font-semibold">ID PRODUK</th>
                        <th class="w-32 text-left pb-2 font-semibold">ID KATEGORI</th>
                        <th class="w-1/4 text-left pb-2 font-semibold">NAMA PRODUK</th>
                        <th class="w-1/4 text-left pb-2 font-semibold">HARGA</th>
                        <th class="w-32 text-center pb-2 font-semibold">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menu as $item)
                        <tr class="bg-white shadow-sm rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                            <td class="py-4 pl-4 rounded-l-xl text-sm text-gray-700 font-medium">
                                <span class="px-4">{{ $loop->iteration }}</span>
                            </td>
                            <td class="py-4 text-sm text-gray-600">
                                 {{ Str::limit($item->id, 8, '...') }}
                            </td>
                            <td class="py-4 text-sm text-gray-600">
                                 {{ Str::limit($item->id_kategori, 8, '...') }}
                            </td>
                            <td class="py-4 text-sm font-semibold text-gray-800">
                                {{ $item->nm_produk }}
                            </td>
                            <td class="py-4 text-sm text-gray-600">
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </td>
                            <td class="py-4 pr-4 rounded-r-xl">
                                <div class="flex items-center justify-center gap-2">

                                    <a href="/detail/{{ $item->id }}"
                                        class="p-1.5 border border-gray-200 rounded text-gray-500 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <button
                                        class="p-1.5 border border-gray-200 rounded text-gray-500 hover:bg-yellow-50 hover:text-yellow-600 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button
                                        class="p-1.5 border border-gray-200 rounded text-gray-500 hover:bg-red-50 hover:text-red-600 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </section>
@endsection
