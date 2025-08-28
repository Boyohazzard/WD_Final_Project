<x-layout>

<div class="container mt-4">
    <h1 class="mb-4">Product List</h1>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            ${{ number_format($product->price_cents / 100, 2) }}
                        </h6>
                        <p class="card-text flex-grow-1">{{ $product->description }}</p>
                        <p class="card-text">
                            <small class="text-muted">Stock: {{ $product->stock }}</small>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


</x-layout>