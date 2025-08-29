@extends('layouts.app')

@section('content')
<h1>Products</h1>

{{-- 筛选/排序 --}}
<form method="get" style="margin:12px 0;">
  <input type="text" name="q" value="{{ request('q') }}" placeholder="Search...">

  <select name="sort">
    @php $sort = request('sort'); @endphp
    <option value="newest"     @selected($sort==='newest')>Newest</option>
    <option value="price_asc"  @selected($sort==='price_asc')>Price ↑</option>
    <option value="price_desc" @selected($sort==='price_desc')>Price ↓</option>
  </select>

  <button type="submit">Filter</button>
</form>

@auth
  <p><a href="{{ route('products.create') }}">+ Create Product</a></p>
@endauth

{{-- 列表 --}}
<ul>
@forelse($products as $p)
  <li>
    <a href="{{ route('products.show', $p) }}">{{ $p->title }}</a>
    — ${{ number_format($p->price, 2) }} (Stock: {{ $p->stock }})
  </li>
@empty
  <li>No products found.</li>
@endforelse
</ul>

{{-- 分页 --}}
<div style="margin-top:12px;">
  {{ $products->withQueryString()->links() }}
</div>
@endsection
