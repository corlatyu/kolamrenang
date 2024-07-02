<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Metode antarmuka web

    public function index()
    {
        $products = Product::all();
        return view('dashboard.admin.kolamrenang.index', compact('products'));
    }

    public function create()
    {
        return view('dashboard.admin.kolamrenang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images/products', 'public');

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $imagePath;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Product $product)
    {
        return view('dashboard.admin.kolamrenang.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('dashboard.admin.kolamrenang.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('images/products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }

    // Metode API

    public function apiIndex()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function apiStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);

        // Simpan gambar ke direktori public/images/products
        $imagePath = $request->file('image')->store('images/products', 'public');

        // Buat data produk dengan nama gambar
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $imagePath;
        $product->save();

        return response()->json(['message' => 'Produk berhasil ditambahkan.', 'product' => $product], 201);
    }

    public function apiShow(Product $product)
    {
        return response()->json($product);
    }

    public function apiUpdate(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('images/products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return response()->json(['message' => 'Produk berhasil diperbarui.', 'product' => $product]);
    }

    public function apiDestroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return response()->json(['message' => 'Produk berhasil dihapus.']);
    }
}
