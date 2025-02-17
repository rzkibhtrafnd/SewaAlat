@extends('layouts.adminapp')

@section('content')
<main>
    <h1 class="text-2xl font-bold">Tambah Kategori</h1>
    <form action="{{ route('admin.kategori.store') }}" method="POST" class="w-full max-w-xl mt-5 flex flex-col gap-5">
        @csrf
        <x-bladewind::input name="nama" label="Nama Kategori" required="true" />
        <x-bladewind::button can_submit="true" class="w-full mx-auto block font-semibold">Simpan</x-bladewind::button>
    </form>
</main>
@endsection
