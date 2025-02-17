@extends('layouts.adminapp')

@section('content')

  <main>
    <h1 class="text-2xl font-bold">Edit Kategori</h1>
    <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST"
    class="w-full max-w-xl mt-5 flex flex-col gap-5">
    @csrf
    @method('PUT')
    <x-bladewind::input name="nama" label="Nama Kategori" value="{{ $kategori->nama }}" required="true" />
    <x-bladewind::button can_submit="true" class="w-full mx-auto block font-semibold">Update</x-bladewind::button>
    </form>
  </main>
@endsection