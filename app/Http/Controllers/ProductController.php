<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Method untuk menampilkan daftar produk
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Method untuk menampilkan form create
    public function create()
    {
        return view('products.create');
    }

    // Method untuk menyimpan data produk
    public function store(Request $request)
    {
    
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255', // Nama produk
            'price' => 'required|numeric|min:0', // Harga produk
            'category' => 'required|in:electronics,furniture,clothing', // Kategori produk
            'release_date' => 'required|date', // Tanggal rilis
            'is_available' => 'required|boolean', // Ketersediaan
        ]);

        

        // Simpan data ke database
        Product::create($validated);

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Product berhasil ditambahkan');
    }
}
