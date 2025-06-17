@extends('layouts.app')

@section('title', 'Tambah Produk Baru')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Tambah Produk Baru</h1>
        <p class="text-gray-600">Buat produk baru untuk toko Anda</p>
    </div>

    <div class="bg-white rounded-xl shadow-xl p-8">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Produk</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition duration-300 @error('name') border-red-500 @enderror">
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition duration-300 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">Harga (Rp)</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" min="0"
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition duration-300 @error('price') border-red-500 @enderror">
                    @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="discount_percentage" class="block text-sm font-semibold text-gray-700 mb-2">Diskon (%)</label>
                    <input type="number" id="discount_percentage" name="discount_percentage" value="{{ old('discount_percentage', 0) }}" min="0" max="100"
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition duration-300 @error('discount_percentage') border-red-500 @enderror">
                    @error('discount_percentage')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="stock" class="block text-sm font-semibold text-gray-700 mb-2">Jumlah Stok</label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock') }}" min="0"
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition duration-300 @error('stock') border-red-500 @enderror">
                    @error('stock')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">Gambar Produk</label>
                    <input type="file" id="image" name="image" accept="image/*"
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition duration-300 @error('image') border-red-500 @enderror">
                    @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex space-x-4 pt-6">
                <button type="submit" class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 font-semibold text-lg transition duration-300">
                    ✅ Buat Produk
                </button>
                <a href="{{ route('products.admin') }}" class="flex-1 bg-gradient-to-r from-gray-600 to-gray-700 text-white py-3 rounded-lg hover:from-gray-700 hover:to-gray-800 text-center font-semibold text-lg transition duration-300">
                    ❌ Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection