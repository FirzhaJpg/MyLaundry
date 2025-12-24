@extends('layouts.app')

@section('page_title', 'My Orders')

@section('content')
    <div class="ml-card">
        <div class="ml-card__header">
            <div class="ml-card__title">My Orders</div>
        </div>

        <div class="ml-card__body ml-table-wrap">
            <table class="ml-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Service</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Payment</th>
                    <th>Laundry</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    @php
                        $paymentBadge = $order->payment_status === 'sudah_bayar' ? 'ml-badge--paid' : 'ml-badge--unpaid';
                        $laundryBadge = match ($order->laundry_status) {
                            'diproses' => 'ml-badge--processing',
                            'selesai' => 'ml-badge--done',
                            'sudah_diambil' => 'ml-badge--picked',
                            default => 'ml-badge--picked',
                        };
                    @endphp
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->service_type }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td><span class="ml-price">{{ $order->price }}</span></td>
                        <td><span class="ml-badge {{ $paymentBadge }}">{{ $order->payment_status }}</span></td>
                        <td><span class="ml-badge {{ $laundryBadge }}">{{ $order->laundry_status }}</span></td>
                        <td>{{ $order->order_date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="ml-pagination">{{ $orders->links('partials.pagination') }}</div>
@endsection
