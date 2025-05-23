@extends('layouts.app')

@section('title', 'Заказы')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Заказы</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Добавить заказ</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>Номер</th>
                    <th>ФИО</th>
                    <th>Статус</th>
                    <th>Комментарий</th>
                    <th>Количество</th>
                    <th>Дата создания</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>
                            <a href="{{ route('orders.show', $order) }}" class="text-decoration-none">
                                {{ $order->id }}
                            </a>
                        </td>
                        <td>{{ $order->customer_name }}</td>
                        <td>
                            <span class="badge bg-{{ $order->status === 'new' ? 'warning' : 'success' }}">
                                {{ $order->status === 'new' ? 'Новый' : 'Выполнено' }}
                            </span>
                        </td>
                        <td>{{ $order->comment }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
