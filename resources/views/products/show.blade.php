@extends('layouts.app')

@section('content')
<h1>{{ $product->title }}</h1>

<p style="margin:6px 0;">
  <strong>Price:</strong> ${{ number_format($product->price, 2) }}
</p>
<p style="margin:6px 0;">
  <strong>Stock:</strong> {{ $product->stock }}
</p>
<p style="margin:12px 0; white-space:pre-wrap;">
  {{ $product->description }}
</p>


<form method="post" action="{{ route('cart.add') }}" style="margin-top:12px;">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->id }}">
  <label>
    Qty:
    <input type="number" name="qty" value="1" min="1" class="border rounded p-1 w-20">
  </label>
  <button type="submit" class="ml-2 px-3 py-1 bg-blue-600 text-white rounded">
    Add to cart
  </button>
</form>

@if (session('success'))
  <p style="color:green;margin-top:8px;">{{ session('success') }}</p>
@endif

@auth
  <p><a href="{{ route('products.edit', $product) }}">Edit</a></p>

  <form method="post" action="{{ route('products.destroy', $product) }}"
        onsubmit="return confirm('Delete?');">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
  </form>
@endauth
@endsection
