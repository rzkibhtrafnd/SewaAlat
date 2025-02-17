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
        <td class="px-6 py-4">
        $2999
        </td>
      </tr>
      <tr class="odd:bg-white  even:bg-gray-50  border-b  border-gray-200">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
        Microsoft Surface Pro
        </th>
        <td class="px-6 py-4">
        White
        </td>
        <td class="px-6 py-4">
        Laptop PC
        </td>
        <td class="px-6 py-4">
        $1999
        </td>
        <td class="px-6 py-4">
        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
        </td>
      </tr>
      <tr class="odd:bg-white  even:bg-gray-50  border-b  border-gray-200">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
        Magic Mouse 2
        </th>
        <td class="px-6 py-4">
        Black
        </td>
        <td class="px-6 py-4">
        Accessories
        </td>
        <td class="px-6 py-4">
        $99
        </td>
        <td class="px-6 py-4">
        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
        </td>
      </tr>
      <tr class="odd:bg-white  even:bg-gray-50  border-b  border-gray-200">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
        Google Pixel Phone
        </th>
        <td class="px-6 py-4">
        Gray
        </td>
        <td class="px-6 py-4">
        Phone
        </td>
        <td class="px-6 py-4">
        $799
        </td>
        <td class="px-6 py-4">
        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
        </td>
      </tr>
      <tr>
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
        Apple Watch 5
        </th>
        <td class="px-6 py-4">
        Red
        </td>
        <td class="px-6 py-4">
        Wearables
        </td>
        <td class="px-6 py-4">
        $999
        </td>
        <td class="px-6 py-4">
        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
        </td>
      </tr>
      </tbody>
    </table>
    </div>

  </main>
@endsection