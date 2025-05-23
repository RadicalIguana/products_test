<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\CreateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.form', compact('categories'));
    }

    public function store(CreateProductRequest $request)
    {
        $validated = $request->validated();

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Товар добавлен');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.form', compact('product','categories'));
    }

    public function update(CreateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Товар обновлен');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Товар удален');
    }
}
