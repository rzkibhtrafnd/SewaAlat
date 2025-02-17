@extends('layouts.adminapp')

@section('content')
  <div class="container mx-auto px-6">
    <h1 class="text-2xl font-bold mb-6">Item</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
    @foreach ($products as $product)
    <div class="bg-white w-full border border-gray-200 shadow-lg rounded-xl overflow-hidden">
      <!-- Bagian Gambar -->
      @if ($product->gambar)
      <img src="{{ asset('storage/produk/' . $product->gambar) }}" alt="{{ $product->nama }}"
      class="w-full h-48 object-cover">
    @else
      <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
      No Image
      </div>
    @endif

      <!-- Bagian Konten -->
      <div class="p-4">
      <h2 class="text-lg font-semibold text-gray-800">{{ $product->nama }}</h2>
      <p class="text-sm text-gray-500 mt-2">{{ $product->deskripsi }}</p>

      <!-- Kategori -->
      <div class="mt-3">
      <span class="bg-blue-100 text-blue-600 text-xs font-medium px-3 py-1 rounded-full">
      {{ $product->kategori->nama }}
      </span>
      </div>

      <!-- Harga -->
      <div class="mt-4">
      <p class="text-lg font-bold text-gray-800">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
      </div>
      </div>
    </div>
  @endforeach
    </div>
  </div>
@endsection