@extends('layouts.app')

@section('content')
<h1>Edit Product</h1>

@includeWhen($errors->any(), 'shared.errors')

<form method="post" action="{{ route('products.update', $product) }}">
  @csrf
  @method('PUT')

  <p>
    Title:
    <input name="title" value="{{ old('title', $product->title) }}">
  </p>

  <p>
    Slug (optional):
    <input name="slug" value="{{ old('slug', $product->slug) }}">
  </p>

  <p>
    Price (cents):
    <input type="number" name="price_cents" value="{{ old('price_cents', $product->price_cents) }}">
  </p>

  <p>
    Stock:
    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
  </p>

  <p>
    Description:<br>
    <textarea name="description" rows="6">{{ old('description', $product->description) }}</textarea>
  </p>

  <button type="submit">Update</button>
</form>
@endsection
