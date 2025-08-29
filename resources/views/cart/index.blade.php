@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Your Cart</h1>

@if (session('success'))
  <p class="mb-3 text-green-600">{{ session('success') }}</p>
@endif

@if (empty($items))
  <p>Your cart is empty.</p>
  <p class="mt-2"><a class="text-blue-600 underline" href="{{ route('products.index') }}">Browse products</a></p>
@else
  <table class="min-w-full bg-white border mb-4">
    <thead>
      <tr class="border-b">
        <th class="text-left p-2">Product</th>
        <th class="text-left p-2">Price</th>
        <th class="text-left p-2">Qty</th>
        <th class="text-left p-2">Line Total</th>
        <th class="text-left p-2">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($items as $row)
        @php
          $p = $row['product'];
          $qty = $row['qty'];
        @endphp
        <tr class="border-b">
          <td class="p-2">
            <a class="text-blue-600 underline" href="{{ route('products.show', $p) }}">{{ $p->title }}</a>
          </td>
          <td class="p-2">${{ number_format($p->price_cents / 100, 2) }}</td>
          <td class="p-2">
            <form method="post" action="{{ route('cart.update', $p) }}" class="flex items-center gap-2">
              @csrf @method('PATCH')
              <input type="number" name="qty" value="{{ $qty }}" min="0" class="border rounded p-1 w-20">
              <button class="px-2 py-1 bg-gray-800 text-white rounded">Update</button>
            </form>
          </td>
          <td class="p-2">${{ number_format($row['line_cents'] / 100, 2) }}</td>
          <td class="p-2">
            <form method="post" action="{{ route('cart.remove', $p) }}">
              @csrf @method('DELETE')
              <button class="px-2 py-1 bg-red-600 text-white rounded" onclick="return confirm('Remove this item?')">Remove</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <p class="text-lg font-medium">Subtotal:
    ${{ number_format($subtotal_cents / 100, 2) }}
  </p>

  <div class="mt-4 flex gap-3">
    <form method="post" action="{{ route('cart.clear') }}">
      @csrf @method('DELETE')
      <button class="px-3 py-2 bg-gray-500 text-white rounded" onclick="return confirm('Clear cart?')">Clear Cart</button>
    </form>

    @auth
      <form method="post" action="{{ route('orders.store') }}">
        @csrf
        <button class="px-3 py-2 bg-green-600 text-white rounded">Checkout</button>
      </form>
    @else
      <a class="px-3 py-2 bg-blue-600 text-white rounded" href="{{ route('login') }}">Login to Checkout</a>
    @endauth
  </div>
@endif
@endsection
