@extends('layouts.app')

@section('content')
<h1>Create Product</h1>

@includeWhen($errors->any(), 'shared.errors')

<form method="post" action="{{ route('products.store') }}">
  @csrf

  <p>
    Title:
    <input name="title" value="{{ old('title') }}">
  </p>

  <p>
    Slug (optional):
    <input name="slug" value="{{ old('slug') }}">
  </p>

  <p>
    Price (cents):
    <input type="number" name="price_cents" value="{{ old('price_cents') }}">
  </p>

  <p>
    Stock:
    <input type="number" name="stock" value="{{ old('stock') }}">
  </p>

  <p>
    Description:<br>
    <textarea name="description" rows="6">{{ old('description') }}</textarea>
  </p>

  <button type="submit">Create</button>
</form>
@endsection
