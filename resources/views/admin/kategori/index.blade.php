@extends('layouts.adminapp')

@section('content')
  <main>
    <h1 class="text-2xl font-bold">Data Kategori</h1>


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
        Action
        </th>
      </tr>
      </thead>
      <tbody>
      <tr class="odd:bg-white  even:bg-gray-50  border-b  border-gray-200">
        <td class="px-6 py-4">
        1
        </td>
        <td class="px-6 py-4">
        Tenda
        </td>
        <td class="px-6 py-4">
        Laptop
        </td>
      </tr>
      </tbody>
    </table>
    </div>

  </main>
@endsection