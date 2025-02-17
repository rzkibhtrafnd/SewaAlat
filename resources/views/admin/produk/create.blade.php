@extends('layouts.adminapp')

@section('content')
    <main>
        <h1 class="text-2xl font-bold">Tambah Produk</h1>
        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data"
            class="w-full max-w-xl mt-5 flex flex-col gap-5">
            @csrf
            <x-bladewind::filepicker name="gambar" placeholder="Pilih Gambar Barang" />
            <x-bladewind::input name="nama" label="Nama Barang" required="true" />

            <x-bladewind::select :data="$kategoris->map(fn($kategori) => ['label' => $kategori->nama, 'value' => $kategori->id])->toArray()" name="kategori" required="true" label="Pilih Kategori Barang" />

            <x-bladewind::input name="stok" label="Stok Tersedia" required="true" numeric="true" />
            <x-bladewind::input name="harga" label="Harga" required="true" numeric="true" />
            <x-bladewind::textarea name="deskripsi" required="true" label="Deskripsi" />
            <x-bladewind::button can_submit="true" class="w-full mx-auto block font-semibold">Simpan</x-bladewind::button>
        </form>
    </main>
@endsection