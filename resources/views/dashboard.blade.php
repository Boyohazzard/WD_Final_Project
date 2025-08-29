@extends('layouts.app')

@php
    $title = 'Dashboard';
@endphp


@section('content')
    <h1 class="text-2xl font-bold">Dashboard</h1>

    <p class="mt-4">You're logged in as <strong>{{ Auth::user()->name }}</strong> 🎉</p>

    <p class="mt-4">
        <a href="{{ route('products.index') }}" class="text-blue-600 underline">Go to Products</a>
    </p>

    <p>or head on over to your <a href="{{ route('cart.index') }}" class="text-blue-600 underline">cart</a> if you signed in to check out</p>
@endsection
