@extends('layouts.app')

@section('title', 'Товары')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Товары</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Добавить товар</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>Наименование</th>
                    <th>Категория</th>
                    <th>Цена</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <a href="{{ route('products.show', $product) }}" class="text-decoration-none">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->price }} ₽</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Редактировать</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены, что хотите удалить товар?')">Удалить</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

