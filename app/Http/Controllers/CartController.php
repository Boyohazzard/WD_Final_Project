<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []); // [id => qty]

        $items = [];
        $subtotal_cents = 0;

        if (!empty($cart)) {
            $products = Product::whereIn('id', array_keys($cart))->get();

            foreach ($products as $p) {
                $qty = max(0, (int)($cart[$p->id] ?? 0));
                if ($qty <= 0) continue;

                $line_cents = $p->price_cents * $qty;
                $subtotal_cents += $line_cents;

                $items[] = [
                    'product' => $p,
                    'qty'     => $qty,
                    'line_cents' => $line_cents,
                ];
            }
        }

        return view('cart.index', [
            'items' => $items,
            'subtotal_cents' => $subtotal_cents,
        ]);
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required','integer','exists:products,id'],
            'qty'        => ['nullable','integer','min:1'],
        ]);

        $qty = $data['qty'] ?? 1;

        $cart = $request->session()->get('cart', []);
        $cart[$data['product_id']] = ($cart[$data['product_id']] ?? 0) + $qty;
        $request->session()->put('cart', $cart);

        return back()->with('success', 'Added to cart.');
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'qty' => ['required','integer','min:0'],
        ]);

        $cart = $request->session()->get('cart', []);
        if ($data['qty'] <= 0) {
            unset($cart[$product->id]);
        } else {
            $cart[$product->id] = $data['qty'];
        }
        $request->session()->put('cart', $cart);

        return back()->with('success', 'Cart updated.');
    }

    public function remove(Request $request, Product $product)
    {
        $cart = $request->session()->get('cart', []);
        unset($cart[$product->id]);
        $request->session()->put('cart', $cart);

        return back()->with('success', 'Item removed.');
    }

    public function clear(Request $request)
    {
        $request->session()->forget('cart');
        return back()->with('success', 'Cart cleared.');
    }
}
