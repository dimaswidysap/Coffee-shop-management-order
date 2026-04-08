@extends('layout.master')

@section('konten')
    <section class="w-full md:pl-[13rem] lg:pl-[16rem] pr-4 flex justify-end">
        <section class="h-52 w-full max-w-7xl">
            <h1 class="py-12 text-3xl font-black font-dark">Edit Kategori</h1>

            {{-- Pastikan action diarahkan ke route update dan tambahkan method PUT --}}
            <form class="w-full" action="/kategori/{{ $data->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="flex flex-col mb-4"> {{-- Tambah sedikit margin bottom agar antar input tidak menempel --}}
                    <label for="nm_kategori" class="font-dark font-semibold">Edit Nama Kategori</label>
                    <input type="text" id="" name="nama_kategori_update"
                        value="{{ old('nm_kategori', $data->nm_kategori) }}"
                        class="background-secondary w-1/2 py-1.5 px-1 rounded-md shadow-ms">
                        @error('nama_kategori_update')
                            <span class="text-red-500 text-xs mt-1 font-semibold">
                                 {{ $message }}
                            </span>
                        @enderror
                </div>

                <div class="flex flex-col">
                    <label for="keterangan_kategori" class="font-dark font-semibold">Keterangan Kategori</label>
                    {{-- Perbaikan: Menghilangkan spasi/indentasi di dalam textarea agar data tidak berantakan --}}
                    <textarea name="keterangan_kategori_update" id="" rows="5"
                        class="background-secondary w-1/2 py-1.5 px-1 rounded-md shadow-ms">{{ old('keterangan_kategori', $data->keterangan_kategori) }}</textarea>
                </div>

                {{-- Jangan lupa tambahkan button submit jika belum ada --}}
                <button
                    class="mt-4 px-4 py-2 bg-green-400 shadow-md font-black font-dark cursor-pointer rounded-md">Simpan
                    Perubahan</button>
            </form>
            <a href="/kategori"
                class="inline-flex mt-5 px-4 py-2 bg-red-700 shadow-md font-black font-white cursor-pointer rounded-md">Batal</a>
        </section>
    </section>
@endsection
