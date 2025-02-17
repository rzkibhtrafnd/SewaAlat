@extends('layouts.adminapp')

@section('content')
  <main>
    <h1 class="text-2xl font-bold">Edit Produk</h1>
    <form action="" class="w-full max-w-xl mt-5 flex flex-col gap-5">
    <x-bladewind::filepicker name="image" placeholder="Pilih Gambar Barang" />
    <x-bladewind::input name="name" label="Nama Barang" required="true" />
    <x-bladewind::select name="category" required="true" label="Pilih Kategori Barang" />
    <x-bladewind::input name="stock" label="Stok Tersedia" required="true" numeric="true" />
    <x-bladewind::input name="price" label="Harga" required="true" numeric="true" />
    <x-bladewind::textarea name="description" required="true" label="Deskripsi" />
    <x-bladewind::button can_submit="true" class="w-full mx-auto block font-semibold">Simpan</x-bladewind::button>
    </form>
  </main>
@endsection