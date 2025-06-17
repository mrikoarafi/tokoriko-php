@extends('layouts.app')

@section('title', $product->name . ' - TokoRiko')

@section('content')
<div class="bg-white rounded-xl shadow-xl overflow-hidden">
    <div class="md:flex">
        <div class="md:w-1/2 relative">
            @if($product->image)
            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-96 md:h-full object-cover">
            @else
            <div class="w-full h-96 md:h-full bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                <div class="text-center">
                    <div class="text-6xl mb-4">📷</div>
                    <span class="text-gray-600 text-xl">Tidak Ada Gambar</span>
                </div>
            </div>
            @endif

            @if($product->hasDiscount())
            <div class="absolute top-4 left-4 bg-red-500 text-white px-4 py-2 rounded-full text-lg font-bold">
                -{{ $product->discount_percentage }}% OFF
            </div>
            @endif
        </div>

        <div class="md:w-1/2 p-8 lg:p-12">
            <div class="mb-4">
                @if($product->stock > 0)
                <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">✅ Tersedia</span>
                @else
                <span class="inline-block bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-semibold">❌ Stok Habis</span>
                @endif
            </div>

            <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
            <p class="text-gray-600 mb-8 text-lg leading-relaxed">{{ $product->description }}</p>

            <div class="mb-8">
                @if($product->hasDiscount())
                <div class="space-y-2">
                    <div class="flex items-center space-x-3">
                        <span class="text-4xl font-bold text-red-600">Rp {{ number_format($product->discounted_price, 0, ',', '.') }}</span>
                        <span class="bg-red-500 text-white px-3 py-1 rounded-lg text-sm font-bold">HEMAT {{ $product->discount_percentage }}%</span>
                    </div>
                    <div class="text-lg text-gray-500 line-through">Harga Asli: Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                    <div class="text-green-600 font-semibold">Anda hemat: Rp {{ number_format($product->price - $product->discounted_price, 0, ',', '.') }}</div>
                </div>
                @else
                <span class="text-4xl font-bold text-blue-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                @endif
            </div>

            <div class="mb-8 p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center justify-between">
                    <span class="text-lg text-gray-700 font-semibold">Stok Tersedia:</span>
                    <span class="text-2xl font-bold {{ $product->stock > 10 ? 'text-green-600' : ($product->stock > 0 ? 'text-orange-600' : 'text-red-600') }}">
                        {{ $product->stock }} unit
                    </span>
                </div>
                @if($product->stock <= 15 && $product->stock > 0)
                    <div class="mt-2 text-orange-600 text-sm font-semibold">⚠️ Hanya tersisa {{ $product->stock }} unit!</div>
                    @endif
            </div>

            <div class="space-y-3">
                <a href="{{ route('products.index') }}" class="block w-full bg-gradient-to-r from-gray-600 to-gray-700 text-white py-3 rounded-lg hover:from-gray-700 hover:to-gray-800 text-center font-semibold transition duration-300">
                    ← Kembali ke Produk
                </a>
            </div>
        </div>
    </div>
</div>
@endsection