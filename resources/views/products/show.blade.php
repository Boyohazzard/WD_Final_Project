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
