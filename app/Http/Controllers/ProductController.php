<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // GET /products?q=...&sort=price_asc|price_desc|newest
    public function index(Request $request)
    {
        $q    = (string) $request->query('q', '');
        $sort = (string) $request->query('sort', 'newest');

        $products = Product::query()
            ->when($q, fn($qb) => $qb->where(function($w) use ($q) {
                $w->where('title','like',"%{$q}%")
                  ->orWhere('description','like',"%{$q}%");
            }))
            ->when($sort === 'price_asc',  fn($q) => $q->orderBy('price_cents','asc'))
            ->when($sort === 'price_desc', fn($q) => $q->orderBy('price_cents','desc'))
            ->when($sort === 'newest',     fn($q) => $q->latest())
            ->paginate(12)
            ->withQueryString();

        return view('products.index', compact('products','q','sort'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->validated());
        return redirect()->route('products.index')->with('success','Product created.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()->route('products.show',$product)->with('success','Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted.');
    }
}
