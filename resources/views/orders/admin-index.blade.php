@extends('layouts.app')

@section('page_title', 'Laundry')

@section('content')
    <div class="ml-card">
        <div class="ml-card__header">
            <div class="ml-card__title">Laundry Orders</div>
            <a class="ml-btn" href="{{ route('admin.orders.create') }}">
                <i data-lucide="file-plus"></i>
                Create Order
            </a>
        </div>

        <div class="ml-card__body ml-table-wrap">
            <table class="ml-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Service</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Payment</th>
                    <th>Laundry</th>
                    <th>Update</th>
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
                        <td>
                            <div class="ml-kv">
                                <div class="ml-kv__primary">{{ $order->customer_name }}</div>
                                <div class="ml-kv__secondary">{{ $order->customer_phone }}</div>
                                <div class="ml-kv__secondary">{{ $order->user?->email }}</div>
                            </div>
                        </td>
                        <td>{{ $order->service_type }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td><span class="ml-price">{{ $order->price }}</span></td>
                        <td><span class="ml-badge {{ $paymentBadge }}">{{ $order->payment_status }}</span></td>
                        <td><span class="ml-badge {{ $laundryBadge }}">{{ $order->laundry_status }}</span></td>
                        <td>
                            <form method="POST" action="{{ route('admin.orders.update-status', $order) }}" class="ml-table-actions">
                                @csrf
                                @method('PATCH')
                                <select class="ml-select" name="payment_status">
                                    <option value="belum_bayar" @selected($order->payment_status === 'belum_bayar')>belum_bayar</option>
                                    <option value="sudah_bayar" @selected($order->payment_status === 'sudah_bayar')>sudah_bayar</option>
                                </select>
                                <select class="ml-select" name="laundry_status">
                                    <option value="diproses" @selected($order->laundry_status === 'diproses')>diproses</option>
                                    <option value="selesai" @selected($order->laundry_status === 'selesai')>selesai</option>
                                    <option value="sudah_diambil" @selected($order->laundry_status === 'sudah_diambil')>sudah_diambil</option>
                                </select>
                                <button class="ml-btn ml-btn--ghost ml-btn--sm" type="submit">
                                    <i data-lucide="save"></i>
                                    Save
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="ml-pagination">{{ $orders->links('partials.pagination') }}</div>
@endsection
