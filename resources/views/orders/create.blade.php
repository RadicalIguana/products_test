@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Создать заказ</h1>

    <form action="{{ route('orders.store') }}" method="POST" class="row g-3">
        @csrf

        <div class="col-md-6">
            <label for="customer_name" class="form-label">ФИО покупателя <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                   name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required>
            @error('customer_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="product_id" class="form-label">Товар <span class="text-danger">*</span></label>
            <select name="product_id" id="product_id"
                    class="form-select @error('product_id') is-invalid @enderror" required>
                <option value="">Выберите товар</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" @selected(old('product_id') == $product->id)>
                        {{ $product->name }} - {{ $product->price }} ₽
                    </option>
                @endforeach
            </select>
            @error('product_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-3">
            <label for="quantity" class="form-label">Количество <span class="text-danger">*</span></label>
            <input type="number" name="quantity" id="quantity"
                   class="form-control @error('quantity') is-invalid @enderror"
                   value="{{ old('quantity', 1) }}" min="1" required>
            @error('quantity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="comment" class="form-label">Комментарий</label>
            <textarea name="comment" id="comment"
                      class="form-control @error('comment') is-invalid @enderror" rows="4">{{ old('comment') }}</textarea>
            @error('comment')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-success">Создать заказ</button>
        </div>
    </form>
</div>
@endsection
