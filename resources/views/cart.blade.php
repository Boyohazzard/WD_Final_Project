<x-layout>


<div class="container mt-4">
    <h1 class="mb-4">Products in cart</h1>

    <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $cartDetails }}</h5>
                        <form method="POST" action="{{ url('/cart/' . $cartDetails) }}">
                        @csrf
                        @method('DELETE')
                            <button class="btn btn-danger" type="submit">Remove from Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        <h4 class="text-end mt-4">
            Total: ${{ number_format($total_cents / 100, 2) }}
        </h4>
    </div>
</div>

</x-layout>