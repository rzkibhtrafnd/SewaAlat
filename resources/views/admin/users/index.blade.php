@extends('layouts.adminapp')

@section('content')
  <main>
    <h1 class="text-2xl font-bold">Data Pengguna</h1>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50">
      <tr>
        <th scope="col" class="px-6 py-3">
        Nama
        </th>
        <th scope="col" class="px-6 py-3">
        Email
        </th>
        <th scope="col" class="px-6 py-3">
        Role
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
        <td class="px-6 py-4 flex items-center gap-4">
        <x-bladewind::button>Lihat</x-bladewind::button>
        <x-bladewind::button color="yellow">Edit</x-bladewind::button>
        </td>
      </tr>
      </tbody>
    </table>
    </div>

  </main>
@endsection