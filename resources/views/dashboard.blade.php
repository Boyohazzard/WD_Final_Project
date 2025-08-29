@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Dashboard</h1>

    <p class="mt-4">You're logged in as <strong>{{ Auth::user()->name }}</strong> 🎉</p>

    <p class="mt-4">
        <a href="{{ route('products.index') }}" class="text-blue-600 underline">Go to Products</a>
    </p>
@endsection
