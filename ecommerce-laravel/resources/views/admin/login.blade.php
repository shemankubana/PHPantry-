@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
    <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-8 rounded-lg p-4 bg-gradient-to-r from-teal-400 via-green-500 to-blue-500 text-white shadow-lg">
        Admin Portal Login
    </h1>

    <a href="{{ route('products.index') }}" class="store-link">Back to Storefront</a>

    <x-message />

    <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm mx-auto my-10">
        <h2 class="text-2xl font-bold text-gray-700 mb-6 text-center">Admin Login</h2>
        <form action="{{ route('admin.attempt_login') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" class="form-input" required>
            <input type="password" name="password" placeholder="Password" class="form-input" required>
            <button type="submit" class="btn-primary w-full">Login</button>
        </form>
    </div>
@endsection
