@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-8 rounded-lg p-4 bg-gradient-to-r from-teal-400 via-green-500 to-blue-500 text-white shadow-lg">
        Admin Portal
    </h1>

    <a href="{{ route('products.index') }}" class="store-link">Back to Storefront</a>

    <x-message />

    <div class="flex justify-end mb-6">
        <a href="{{ route('admin.logout') }}" class="btn-secondary">Logout</a>
    </div>

    <section class="mb-12 bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-3xl font-bold text-gray-700 mb-6 text-center">Add New Product</h2>
        <form action="{{ route('admin.products.add') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Product Name" class="form-input @error('name') border-red-500 @enderror" value="{{ old('name') }}" required>
            @error('name')<p class="text-red-500 text-xs italic mb-2">{{ $message }}</p>@enderror

            <textarea name="description" placeholder="Product Description" class="form-input h-24">{{ old('description') }}</textarea>

            <input type="number" name="price" placeholder="Price (e.g., 29.99)" step="0.01" min="0.01" class="form-input @error('price') border-red-500 @enderror" value="{{ old('price') }}" required>
            @error('price')<p class="text-red-500 text-xs italic mb-2">{{ $message }}</p>@enderror

            <input type="text" name="image_url" placeholder="Image URL (e.g., https://placehold.co/128x128/text=Product)" class="form-input @error('image_url') border-red-500 @enderror" value="{{ old('image_url') }}">
            @error('image_url')<p class="text-red-500 text-xs italic mb-2">{{ $message }}</p>@enderror

            <button type="submit" class="btn-primary w-full">Add Product</button>
        </form>
    </section>

    <section class="mb-12 bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-3xl font-bold text-gray-700 mb-6 text-center">Existing Products</h2>
        @if ($products->count() > 0)
            <table class="w-full admin-table border-collapse">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><img src="{{ htmlspecialchars($product->image_url) }}" alt="{{ htmlspecialchars($product->name) }}" class="w-12 h-12 object-cover rounded-md" onerror="this.onerror=null;this.src='https://placehold.co/48x48/e2e8f0/64748b?text=Img';"></td>
                            <td>{{ htmlspecialchars($product->name) }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>
                                <form action="{{ route('admin.products.delete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn-secondary text-xs">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-gray-500">No products found in the database. Add some above!</p>
        @endif
    </section>
@endsection
