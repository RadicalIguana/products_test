<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use App\Http\Requests\CreateOrderRequest;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(CreateOrderRequest $request)
    {
        $validated = $request->validated();

        Order::create($validated);

        return redirect()->route('orders.index')->with('success', 'Заказ добавлен');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function complete(Order $order)
    {
        $order->update(['status' => 'completed']);
        return redirect()->route('orders.index')->with('success', 'Статус заказа обновлен');
    }
}
