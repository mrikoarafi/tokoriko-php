@extends('layouts.app')

@section('title', 'Admin - Kelola Produk')

@section('content')
<div class="mb-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Kelola Produk</h1>
            <p class="text-gray-600">Kelola inventori toko Anda</p>
        </div>
        <a href="{{ route('products.create') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 transition duration-300 font-semibold">
            ➕ Tambah Produk Baru
        </a>
    </div>

    @if($products->count() > 0)
    <div class="bg-white rounded-xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Produk</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Diskon</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Stok</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($products as $product)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                @if($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-lg shadow-md">
                                @else
                                <div class="w-16 h-16 bg-gradient-to-br from-gray-300 to-gray-400 rounded-lg flex items-center justify-center shadow-md">
                                    <span class="text-xs text-gray-600">📷</span>
                                </div>
                                @endif
                                <div class="ml-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ Str::limit($product->name, 50) }}</div>
                                    <div class="text-sm text-gray-500">{{ Str::limit($product->description, 50) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($product->hasDiscount())
                            <div class="space-y-1">
                                <div class="text-sm font-bold text-red-600">Rp {{ number_format($product->discounted_price, 0, ',', '.') }}</div>
                                <div class="text-xs text-gray-500 line-through">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                            </div>
                            @else
                            <div class="text-sm font-semibold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($product->hasDiscount())
                            <span class="inline-block bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-bold">
                                {{ $product->discount_percentage }}% OFF
                            </span>
                            @else
                            <span class="text-gray-400 text-sm">Tidak ada diskon</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                                {{ $product->stock > 10 ? 'bg-green-100 text-green-800' : 
                                   ($product->stock > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ $product->stock }} unit
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-3">
                                <a href="{{ route('products.show', $product) }}" class="text-blue-600 hover:text-blue-900 transition duration-200">👁️ Lihat</a>
                                <a href="{{ route('products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-900 transition duration-200">✏️ Edit</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 transition duration-200">🗑️ Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endif
</div>
@endsection