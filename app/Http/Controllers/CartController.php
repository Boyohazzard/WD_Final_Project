<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class CartController extends Controller
{
    public function view()
    {
        $cart = session('cart', []);

        $products = Product::whereIn('id', array_keys($cart))->get();

        $cartDetails = $products->map(function ($product) use ($cart) {
            $quantity = $cart[$product->id];
            return [
                'product' => $product,
                'quantity' => $quantity,
                'line_total_cents' => $product->price_cents * $quantity,
            ];
        });

        return view('cart', [
            'cartDetails' => $cartDetails,
            'total_cents' => $cartDetails->sum('line_total_cents'),
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        $cart[$productId] = ($cart[$productId] ?? 0) + $quantity;

        session(['cart' => $cart]);

        return redirect('/cart')->with('success', 'Product added to cart.');
    }

    public function remove($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session(['cart' => $cart]);
        }

        return redirect('/cart')->with('success', 'Product removed from cart.');
    }
}
