@extends('layouts.app')

@section('content')
<h1>Products</h1>

{{-- 筛选/排序 --}}
<form method="get" style="margin:12px 0;">
  <input type="text" name="q" value="{{ request('q') }}" placeholder="Search...">

  <select name="sort">
    @php $sort = request('sort'); @endphp
    <option value="newest"     @selected($sort==='newest')>Newest</option>
    <option value="price_asc"  @selected($sort==='price_asc')>Price ↑</option>
    <option value="price_desc" @selected($sort==='price_desc')>Price ↓</option>
  </select>

  <button type="submit">Filter</button>
</form>

@auth
  <p><a href="{{ route('products.create') }}">+ Create Product</a></p>
@endauth

{{-- 列表 --}}

<div class="container mx-auto px-4 mt-6">
    <h1 class="text-2xl font-semibold mb-6">Product List</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <div class="bg-white border rounded shadow p-4 flex flex-col justify-between h-full">
                <div>
                    <h2 class="text-lg font-bold mb-1"><a href="{{ route('products.show', $product) }}" 
                    class="text-blue-600 underline">{{ $product->title }}</a></h2>
                    <p class="text-gray-600 text-sm mb-2">${{ number_format($product->price_cents / 100, 2) }}</p>
                    <p class="text-gray-700 text-sm mb-3">{{ $product->description }}</p>
                    <p class="text-gray-500 text-xs mb-3">Stock: {{ $product->stock }}</p>
                </div>
                <form method="POST" action="{{ route('cart.add') }}" class="mt-auto">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex items-center gap-2">
                        <input
                            type="number"
                            name="qty"
                            value="1"
                            min="1"
                            class="w-16 border rounded p-1 text-sm">
                        <button
                            type="submit"
                            class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                            Add to Cart
                        </button>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
</div>

<div style="margin-top:12px;">
  {{ $products->withQueryString()->links() }}
</div>
@endsection