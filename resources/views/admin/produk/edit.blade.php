@extends('layouts.adminapp')

@section('content')
<main>
    <h1 class="text-2xl font-bold">Edit Produk</h1>
    <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data" class="w-full max-w-xl mt-5 flex flex-col gap-5">
        @csrf
        @method('PUT')
        <x-bladewind::filepicker name="gambar" placeholder="Pilih Gambar Barang" />
        <x-bladewind::input name="nama" label="Nama Barang" value="{{ old('nama', $produk->nama) }}" required="true" />

        <x-bladewind::select name="kategori_id" required="true" label="Pilih Kategori Barang">
            <option value="">Pilih Kategori</option>
            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ $kategori->id == $produk->kategori_id ? 'selected' : '' }}>
                    {{ $kategori->nama }}
                </option>
            @endforeach
        </x-bladewind::select>

        <x-bladewind::input name="stok" label="Stok Tersedia" value="{{ old('stok', $produk->stok) }}" required="true" numeric="true" />
        <x-bladewind::input name="harga" label="Harga" value="{{ old('harga', $produk->harga) }}" required="true" numeric="true" />
        <x-bladewind::textarea name="deskripsi" required="true" label="Deskripsi">{{ old('deskripsi', $produk->deskripsi) }}</x-bladewind::textarea>
        <x-bladewind::button can_submit="true" class="w-full mx-auto block font-semibold">Perbarui</x-bladewind::button>
    </form>
</main>
@endsection
