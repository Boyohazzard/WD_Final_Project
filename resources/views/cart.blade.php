<x-layout>


<div class="container mt-4">
    <h1 class="mb-4">Products in cart</h1>

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
                        <form method="POST" action="{{ url('/cart/' . $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="product_id" value="<?php echo $product['id']?>" require>
                            <button class="btn btn-danger btn-sm remove" name="remove_item">Remove from cart</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</x-layout>