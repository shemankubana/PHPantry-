@extends('layouts.app')

@section('title', 'E-commerce Storefront')

@section('content')
    <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-8 rounded-lg p-4 bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 text-white shadow-lg">
        E-commerce Storefront
    </h1>

    <a href="{{ route('admin.dashboard') }}" class="admin-link">Go to Admin Panel</a>

    <x-message />

    <!-- Product Listing Section -->
    <section class="my-12">
        <h2 class="text-3xl font-bold text-gray-700 mb-6 text-center">Products</h2>
        <div class="product-grid">
            @forelse ($products as $product)
                <div class="product-card">
                    <img src="{{ htmlspecialchars($product->image_url) }}" alt="{{ htmlspecialchars($product->name) }}" class="w-32 h-32 object-cover rounded-md mb-4 shadow-md onerror="this.onerror=null;this.src='https://placehold.co/128x128/e2e8f0/64748b?text=No+Image';'">
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">{{ htmlspecialchars($product->name) }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ htmlspecialchars($product->description) }}</p>
                    <p class="text-2xl font-bold text-indigo-600 mb-4">${{ number_format($product->price, 2) }}</p>
                    <form action="{{ route('cart.add') }}" method="POST" class="w-full">
                        @csrf {{-- Laravel CSRF token for form security --}}
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn-primary w-full">Add to Cart</button>
                    </form>
                </div>
            @empty
                <p class='text-center text-gray-500 col-span-full'>No products found. Please add some using the <a href="{{ route('admin.dashboard') }}" class='text-indigo-600 hover:underline'>Admin Panel</a>.</p>
            @endforelse
        </div>
    </section>

    <!-- Shopping Cart Section -->
    <section class="my-12">
        <h2 class="text-3xl font-bold text-gray-700 mb-6 text-center">Shopping Cart</h2>
        <div class="bg-white rounded-lg shadow-lg p-6">
            @php
                $cart = session('cart', []);
                $total = 0;
            @endphp

            @if (!empty($cart))
                <ul class="divide-y divide-gray-200">
                    @foreach ($cart as $item)
                        @php $itemTotal = $item['price'] * $item['quantity']; $total += $itemTotal; @endphp
                        <li class="cart-item">
                            <div class="flex-grow">
                                <span class="font-medium text-gray-800">{{ htmlspecialchars($item['name']) }}</span>
                                <span class="text-gray-500 text-sm"> (Qty: {{ $item['quantity'] }})</span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="font-semibold text-indigo-600">${{ number_format($itemTotal, 2) }}</span>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                    <button type="submit" class="btn-secondary text-xs px-2 py-1">Remove</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-6 pt-4 border-t-2 border-gray-200 flex justify-between items-center">
                    <span class="text-xl font-bold text-gray-800">Total:</span>
                    <span class="text-2xl font-bold text-green-600">${{ number_format($total, 2) }}</span>
                </div>
                <form action="{{ route('cart.checkout') }}" method="POST" class="mt-6">
                    @csrf
                    <button type="submit" class="btn-primary w-full">Proceed to Checkout</button>
                </form>
            @else
                <p class="text-center text-gray-500">Your shopping cart is empty.</p>
            @endif
        </div>
    </section>
@endsection

