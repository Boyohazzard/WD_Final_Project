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
                             <form method="post" action="{{ url('/cart') }}">
                             @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="input-group">
                                <input type="number" class="form-control" name="qty" value="1" min="1">
                                <button class="btn btn-primary" type="submit">Add to Cart</button>
                                </div>
                            </form>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


</x-layout>