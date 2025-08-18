<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    // Hardcoded Admin Credentials (for demonstration purposes only)
    private $adminUser = 'admin';
    private $adminPass = 'password'; // In a real app, hash this password!

    /**
     * Display the admin login form or dashboard.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if (!Session::get('is_admin')) {
            return view('admin.login');
        }

        $products = Product::orderBy('id', 'desc')->get(); // Fetch products for display
        return view('admin.index', compact('products'));
    }

    /**
     * Handle admin login attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->username === $this->adminUser && $request->password === $this->adminPass) {
            Session::put('is_admin', true);
            return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
        } else {
            return redirect()->back()->with('error', 'Invalid username or password.');
        }
    }

    /**
     * Log the admin out.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Session::forget('is_admin');
        Session::flush(); // Clears all session data
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }

    /**
     * Add a new product to the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addProduct(Request $request)
    {
        if (!Session::get('is_admin')) {
            return redirect()->route('admin.login')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0.01',
            'image_url' => 'nullable|url|max:255',
        ]);

        try {
            Product::create($request->all());
            return redirect()->back()->with('success', 'Product added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error adding product: ' . $e->getMessage());
        }
    }

    /**
     * Delete a product from the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteProduct(Request $request)
    {
        if (!Session::get('is_admin')) {
            return redirect()->route('admin.login')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        try {
            Product::destroy($request->product_id);
            return redirect()->back()->with('success', 'Product deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting product: ' . $e->getMessage());
        }
    }
}

