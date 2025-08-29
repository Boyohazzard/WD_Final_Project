<x-layout>
  <h1 class="text-2xl font-bold mb-4">Order #{{ $order->id }}</h1>

  <p>Total: ${{ number_format($order->total_cents / 100, 2) }}</p>
  <p>Status: {{ $order->status }}</p>

  <h2 class="text-xl font-semibold mt-4 mb-2">Items</h2>
  <ul class="list-disc pl-5">
    @foreach($order->items as $item)
      <li>
        {{ $item->product->title }} × {{ $item->quantity }}
        — ${{ number_format($item->unit_price_cents / 100, 2) }}
        (line: ${{ number_format($item->line_total_cents / 100, 2) }})
      </li>
    @endforeach
  </ul>

  <div class="mt-4">
    <a class="text-blue-600 underline" href="{{ route('orders.index') }}">← Back to Orders</a>
  </div>
</x-layout>
