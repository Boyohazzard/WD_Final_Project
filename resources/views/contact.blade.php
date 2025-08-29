@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8">
  <h1 class="text-2xl font-semibold mb-4">Contact</h1>
  <p class="mb-4">You can reach us at: support@products.com</p>

  <form class="space-y-4">
    <div>
      <label class="block text-sm font-medium">Name</label>
      <input class="border rounded px-3 py-2 w-full" placeholder="Your name">
    </div>
    <div>
      <label class="block text-sm font-medium">Email</label>
      <input class="border rounded px-3 py-2 w-full" placeholder="you@hotmail.com">
    </div>
    <div>
      <label class="block text-sm font-medium">Message</label>
      <textarea class="border rounded px-3 py-2 w-full" rows="4"></textarea>
    </div>
    <button class="bg-black text-white px-4 py-2 rounded">Send</button>
  </form>
</div>
@endsection