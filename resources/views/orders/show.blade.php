@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Заказ №{{ $order->id }}</h1>

    <div class="mb-3">
        <strong>ФИО покупателя:</strong> {{ $order->customer_name }}
    </div>

    <div class="mb-3">
        <strong>Дата создания:</strong> {{ $order->created_at->format('d.m.Y') }}
    </div>

    <div class="mb-3">
        <strong>Комментарий:</strong> {{ $order->comment ?? '—' }}
    </div>

    <div class="mb-3">
        <strong>Статус:</strong>
        <span class="badge {{ $order->status === 'new' ? 'bg-warning text-dark' : 'bg-success' }}">
            {{ $order->status === 'new' ? 'Новый' : 'Выполнено' }}
        </span>
    </div>

    <div class="mb-4">
        <h5>Товар:</h5>
        <ul class="list-group">
            <li class="list-group-item"><strong>Наименование:</strong> {{ $order->product->name }}</li>
            <li class="list-group-item"><strong>Категория:</strong> {{ $order->product->category->name }}</li>
            <li class="list-group-item"><strong>Цена за единицу:</strong> {{ number_format($order->product->price / 100, 2, ',', ' ') }} ₽</li>
            <li class="list-group-item"><strong>Количество:</strong> {{ $order->quantity }}</li>
        </ul>
    </div>

    <div class="mb-4">
        <strong>Итоговая цена:</strong>
        <span class="fs-5">
            {{ $order->product->price * $order->quantity }} ₽
        </span>
    </div>

    @if ($order->status === 'new')
        <form method="POST" action="{{ route('orders.complete', $order->id) }}">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-primary">Отметить как выполненный</button>
        </form>
    @else
        <p class="text-success fw-semibold">Заказ уже выполнен</p>
    @endif

    <a href="{{ route('orders.index') }}" class="btn btn-link mt-3">← Назад к списку заказов</a>
</div>
@endsection
