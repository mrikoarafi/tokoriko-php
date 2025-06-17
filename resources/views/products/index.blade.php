@extends('layouts.app')

@section('title', 'Semua Produk - TokoRiko')

@section('content')
<div class="mb-8">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Produk Kami</h1>
        <p class="text-gray-600">Temukan penawaran menarik dan produk berkualitas</p>
    </div>

    @if($products->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-1 flex flex-col h-full">
            <div class="relative">
                @if($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                    <span class="text-gray-600 text-lg">📷 Tidak Ada Gambar</span>
                </div>
                @endif

                @if($product->hasDiscount())
                <div class="absolute top-2 left-2 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                    -{{ $product->discount_percentage }}%
                </div>
                @endif

                @if($product->stock <= 0)
                    <div class="absolute top-2 right-2 bg-gray-800 text-white px-3 py-1 rounded-full text-sm font-bold">
                    Stok Habis
            </div>
            @elseif($product->stock <= 5)
                <div class="absolute top-2 right-2 bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                Stok Sedikit
        </div>
        @endif
    </div>

    <div class="p-5 flex-grow flex flex-col">
        <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2 min-h-[3.5rem]">{{ $product->name }}</h3>
        <p class="text-gray-600 text-sm mb-4 line-clamp-2 flex-grow">{{ Str::limit($product->description, 80) }}</p>

        <!-- Price Section - Fixed Layout -->
        <div class="mb-4">
            @if($product->hasDiscount())
            <div class="space-y-1">
                <div class="flex items-center justify-between">
                    <span class="text-lg font-bold text-red-600 truncate">Rp {{ number_format($product->discounted_price, 0, ',', '.') }}</span>
                </div>
                <div class="text-xs text-gray-500 line-through">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
            </div>
            @else
            <span class="text-lg font-bold text-blue-600 block truncate">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
            @endif
        </div>

        <!-- Stock and Button Section -->
        <div class="mt-auto space-y-3">
            <div class="flex justify-center">
                <span class="text-xs text-gray-500 bg-gray-100 px-3 py-1 rounded-full">Stok: {{ $product->stock }}</span>
            </div>

            <a href="{{ route('products.show', $product) }}" class="block w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white text-center py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 transition duration-300 font-semibold text-sm">
                Lihat Detail
            </a>
        </div>
    </div>
</div>
@endforeach
</div>

@endif
</div>
@endsection