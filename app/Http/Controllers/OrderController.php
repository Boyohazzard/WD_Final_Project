<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $cart = session('cart', []);

        if(empty($cart)){
            return redirect('/cart')->with('error', 'Your cart is empty.');
        }
        $userId = Auth::id();
        $products = Product::whereIn('id', array_keys($cart))->get();

        foreach ($products as $product) {
            if ($cart[$product->id] > $product->stock) {
                return redirect('/cart')->with('error', "Not enough stock for {$product->title}.");
            }
        }

        $order = Order::create([
            'user_id' => $userId,
            'total_cents' => 0,
            'status' => 'pending'
        ]);

        $totalCents = 0;

        foreach ($products as $product) {
            $quantity = $cart[$product->id];
            $lineTotal = $product->price_cents * $quantity;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'unit_price_cents' => $product->price_cents,
                'quantity' => $quantity,
                'line_total_cents' => $lineTotal,
            ]);

            $product->decrement('stock', $quantity);

            $totalCents += $lineTotal;
        }

        $order->update(['total_cents' => $totalCents]);

        session()->forget('cart');

        return redirect("/orders/{$order->id}")->with('success', 'Order placed successfully!');
    }

    public function index()
    {
        $userId = Auth::id();

        $orders = Order::where('user_id', $userId)
            ->with('items.product')
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('items.product');

        return view('orders.show', compact('order'));
    }
}
