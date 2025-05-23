@php
    $isEdit = isset($product);
@endphp

@extends('layouts.app')

@section('title', $isEdit ? 'Редактировать товар' : 'Добавить товар')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">{{ $isEdit ? 'Редактировать товар' : 'Добавить товар' }}</h1>

    <form method="POST" action="{{ $isEdit ? route('products.update', $product) : route('products.store') }}" class="row g-3">
        @csrf
        @if($isEdit)
            @method('PUT')
        @endif

        <div class="col-md-6">
            <label for="name" class="form-label">Название <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                   name="name" id="name" value="{{ old('name', $product->name ?? '') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="category_id" class="form-label">Категория <span class="text-danger">*</span></label>
            <select name="category_id" id="category_id" 
                    class="form-select @error('category_id') is-invalid @enderror" required>
                <option value="">Выберите категорию</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="price" class="form-label">Цена <span class="text-danger">*</span></label>
            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                   name="price" id="price" value="{{ old('price', isset($product) ? $product->price : '') }}" required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="description" class="form-label">Описание</label>
            <textarea name="description" id="description" 
                      class="form-control @error('description') is-invalid @enderror" 
                      rows="4">{{ old('description', $product->description ?? '') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-success">{{ $isEdit ? 'Обновить' : 'Создать' }}</button>
            <a href="{{ route('products.index') }}" class="btn btn-link">Отмена</a>
        </div>
    </form>
</div>
@endsection
