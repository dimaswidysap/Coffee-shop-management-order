@extends('layout.master')

@section('konten')
    <section class="w-full md:pl-[13rem] lg:pl-[16rem] pr-4 flex justify-end">
        <section class="relative h-52 w-full max-w-7xl ">
            <a href="/kategori" class="absolute inline-flex justify-center items-center h-10 rounded-full aspect-square bg-background-second shadow-md right-0">
            <span class="absolute w-[40%] h-1 rounded-md bg-foreground -rotate-45"></span>
            <span class="absolute w-[40%] h-1 rounded-md bg-foreground rotate-45"></span>
            </a>
            <h1 class="pb-12 text-3xl font-black text-foreground">Edit Kategori</h1>

            {{-- Pastikan action diarahkan ke route update dan tambahkan method PUT --}}
            <form class="w-full" action="/kategori/{{ $data->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="flex flex-col mb-4">
                    <label for="nm_kategori" class="text-foreground font-semibold">Edit Nama Kategori</label>
                    <input type="text" id="" name="nama_kategori_update"
                        value="{{ old('nm_kategori', $data->nm_kategori) }}"
                        class="bg-background-second text-foreground! w-1/2 py-1.5 px-1 rounded-md shadow-ms">
                        @error('nama_kategori_update')
                            <span class="text-red-500 text-xs mt-1 font-semibold">
                                 {{ $message }}
                            </span>
                        @enderror
                </div>

                <div class="flex flex-col">
                    <label for="keterangan_kategori" class="text-foreground font-semibold">Keterangan Kategori</label>
                    {{-- Perbaikan: Menghilangkan spasi/indentasi di dalam textarea agar data tidak berantakan --}}
                    <textarea name="keterangan_kategori_update" id="" rows="5"
                        class="bg-background-second text-foreground! w-1/2 py-1.5 px-1 rounded-md shadow-ms">{{ old('keterangan_kategori', $data->keterangan_kategori) }}</textarea>
                </div>

                {{-- Jangan lupa tambahkan button submit jika belum ada --}}
                <button
                    class="mt-4 px-4 py-2 bg-background-second shadow-md font-black text-foreground! cursor-pointer rounded-md">Simpan
                    Perubahan</button>
            </form>

        </section>
    </section>
@endsection
