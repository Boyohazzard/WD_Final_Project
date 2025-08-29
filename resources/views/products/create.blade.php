@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-8 bg-white shadow p-6 rounded">
    <h1 class="text-2xl font-semibold mb-6">Create Product</h1>

    @includeWhen($errors->any(), 'shared.errors')

    <form method="POST" action="{{ route('products.store') }}" class="space-y-4">
        @csrf

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input
                id="title"
                name="title"
                type="text"
                value="{{ old('title') }}"
                class="mt-1 w-full border-gray-300 rounded p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
        </div>

        {{-- Optional Slug Field --}}
        {{--
        <div>
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug (optional)</label>
            <input
                id="slug"
                name="slug"
                type="text"
                value="{{ old('slug') }}"
                class="mt-1 w-full border-gray-300 rounded p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
        </div>
        --}}

        <div>
            <label for="price_cents" class="block text-sm font-medium text-gray-700">Price (in cents)</label>
            <input
                id="price_cents"
                name="price_cents"
                type="number"
                value="{{ old('price_cents') }}"
                class="mt-1 w-full border-gray-300 rounded p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
        </div>

        <div>
            <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
            <input
                id="stock"
                name="stock"
                type="number"
                value="{{ old('stock') }}"
                class="mt-1 w-full border-gray-300 rounded p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea
                id="description"
                name="description"
                rows="5"
                class="mt-1 w-full border-gray-300 rounded p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >{{ old('description') }}</textarea>
        </div>

        <div class="text-right">
            <button
                type="submit"
                class="px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700"
            >
                Create
            </button>
        </div>
    </form>
</div>
@endsection