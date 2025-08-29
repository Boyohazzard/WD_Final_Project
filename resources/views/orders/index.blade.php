<x-layout>
  <h1 class="text-2xl font-bold mb-4">My Orders</h1>

  @if(session('success'))
    <div class="text-green-700 mb-3">{{ session('success') }}</div>
  @endif
  @if(session('error'))
    <div class="text-red-700 mb-3">{{ session('error') }}</div>
  @endif

  @forelse($orders as $order)
    <div class="border-b py-2">
      <a class="text-blue-600 underline" href="{{ route('orders.show', $order) }}">
        Order #{{ $order->id }}
      </a>
      — ${{ number_format($order->total_cents / 100, 2) }}
      — {{ $order->status }}
      <div class="text-sm text-gray-500">
        {{ $order->created_at->format('Y-m-d H:i') }}
      </div>
    </div>
  @empty
    <p>No orders yet.</p>
  @endforelse
</x-layout>
