@extends('layouts.adminapp')

@section('content')
<main>
    <h1 class="text-2xl font-bold">Data Produk</h1>
    <div class="mt-4">
        <a href="{{ route('admin.produk.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Tambah Produk
        </a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Kategori</th>
                    <th scope="col" class="px-6 py-3">Stok</th>
                    <th scope="col" class="px-6 py-3">Harga</th>
                    <th scope="col" class="px-6 py-3">Deskripsi</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produks as $index => $produk)
                <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">{{ $produk->nama }}</td>
                    <td class="px-6 py-4">{{ $produk->kategori->nama }}</td>
                    <td class="px-6 py-4">{{ $produk->stok }}</td>
                    <td class="px-6 py-4">${{ number_format($produk->harga, 2) }}</td>
                    <td class="px-6 py-4">{{ $produk->deskripsi }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.produk.edit', $produk->id) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $produks->links() }}
    </div>
</main>
@endsection
