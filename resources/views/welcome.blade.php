@extends('layouts.app')

@php
    $title = 'Welcome :3';
@endphp


@section('content')
    <nav>
      <h2>Welcome to product site, a place for all your product needs</h2>
      <br><br>
      <p>Login to start viewing our amazing products or you can register <a href="{{ route('register') }}" class="text-blue-600 underline">here</a> if you haven't already
    </nav>
<div class="max-w-3xl mx-auto py-8">
  <h1 class="text-2xl font-semibold mb-4">Welcome to Products</h1>
  <p class="mb-4">You can reach us at: support@products.com</p>

  
@endsection