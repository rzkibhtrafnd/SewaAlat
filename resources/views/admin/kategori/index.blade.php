@extends('layouts.adminapp')

@section('content')
  <main>
    <h1 class="text-2xl font-bold">Data Kategori</h1>

    <!-- Button to add new kategori -->
    <div class="mt-4">
    <a href="{{ route('admin.kategori.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
      Tambah Kategori
    </a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50">
      <tr>
        <th scope="col" class="px-6 py-3">No</th>
        <th scope="col" class="px-6 py-3">Nama</th>
        <th scope="col" class="px-6 py-3">Action</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($kategori as $index => $item)
      <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
      <td class="px-6 py-4">{{ $index + 1 }}</td>
      <td class="px-6 py-4">{{ $item->nama }}</td>
      <td class="px-6 py-4">
      <a href="{{ route('admin.kategori.edit', $item->id) }}"
        class="font-medium text-blue-600 hover:underline">Edit</a>
      <form action="{{ route('admin.kategori.destroy', $item->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600 hover:underline">Delete</button>
      </form>
      </td>
      </tr>
    @endforeach
      </tbody>
    </table>
    </div>
  </main>
@endsection