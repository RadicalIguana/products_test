@extends('layouts.app')

@section('title', 'Товар: ' . $product->name)

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">{{ $product->name }}</h1>

    <div class="mb-4">
        <h5>Информация о товаре:</h5>
        <ul class="list-group">
            <li class="list-group-item"><strong>Категория:</strong> {{ $product->category->name }}</li>
            <li class="list-group-item"><strong>Цена:</strong> {{ number_format($product->price / 100, 2, ',', ' ') }} ₽</li>
            <li class="list-group-item"><strong>Описание:</strong> {{ $product->description ?? '—' }}</li>
        </ul>
    </div>

    <div class="mb-4">
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Редактировать</a>
        <a href="{{ route('products.index') }}" class="btn btn-link">← Назад к списку товаров</a>
    </div>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить товар?')">Удалить товар</button>
    </form>
</div>
@endsection

