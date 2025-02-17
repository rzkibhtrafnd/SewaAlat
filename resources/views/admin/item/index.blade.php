@extends('layouts.adminapp')

@section('content')
  <main>
    <h1 class="text-2xl font-bold">Data Produk</h1>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50">
      <tr>
        <th scope="col" class="px-6 py-3">
        No
        </th>
        <th scope="col" class="px-6 py-3">
        Nama
        </th>
        <th scope="col" class="px-6 py-3">
        Category
        </th>
        <th scope="col" class="px-6 py-3">
        Stok
        </th>
        <th scope="col" class="px-6 py-3">
        Harga
        </th>
        <th scope="col" class="px-6 py-3">
        Deskripsi
        </th>
        <th scope="col" class="px-6 py-3">
        Action
        </th>
      </tr>
      </thead>
      <tbody>
      <tr class="odd:bg-white  even:bg-gray-50  border-b  border-gray-200">
        <td class="px-6 py-4">
        Silver
        </td>
        <td class="px-6 py-4">
        Silver
        </td>
        <td class="px-6 py-4">
        Laptop
        </td>
        <td class="px-6 py-4">
        $2999
        </td>
        <td class="px-6 py-4">
        $2999
        </td>
        <td class="px-6 py-4">
        $2999
        </td>
        <td class="px-6 py-4 flex items-center gap-4">
        <x-bladewind::button>Edit</x-bladewind::button>
        <x-bladewind::button color="red">Hapus</x-bladewind::button>
        </td>
      </tr>
      </tbody>
    </table>
    </div>

  </main>
@endsection