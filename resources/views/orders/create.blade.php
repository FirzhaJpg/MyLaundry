@extends('layouts.app')

@section('page_title', 'Buat Order')

@section('content')
    <div class="ml-card">
        <div class="ml-card__header">
            <div class="ml-card__title">Buat Order</div>
        </div>

        <div class="ml-card__body">
            <form method="POST" action="{{ route('admin.orders.store') }}" class="ml-form-grid">
                @csrf

                <div class="ml-field ml-span-2">
                    <label class="ml-label">User</label>
                    <select class="ml-select" name="user_id" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="ml-field">
                    <label class="ml-label">Customer Name (snapshot)</label>
                    <input class="ml-input" name="customer_name" required>
                </div>

                <div class="ml-field">
                    <label class="ml-label">Customer Phone (snapshot)</label>
                    <input class="ml-input" name="customer_phone" required>
                </div>

                <div class="ml-field">
                    <label class="ml-label">Service Type</label>
                    <select class="ml-select" name="service_type" required>
                        <option value="" disabled selected>Pilih Servis kamu</option>
                        <option value="Wash & Dry">Wash & Dry</option>
                        <option value="Wash & Iron">Wash & Iron</option>
                        <option value="Iron Only">Iron Only</option>
                        <option value="Dry Cleaning">Dry Cleaning</option>
                        <option value="Cuci Satuan">Cuci Satuan</option>
                    </select>
                </div>

                <div class="ml-field">
                    <label class="ml-label">Weight / Quantity</label>
                    <input class="ml-input" name="quantity" type="number" step="0.01" placeholder="0 Kg" required>
                </div>

                <div class="ml-field">
                    <label class="ml-label">Price</label>
                    <input class="ml-input" name="price" type="number" step="0.01" placeholder="Rp 0" required>
                </div>

                <div class="ml-field">
                    <label class="ml-label">Payment Status</label>
                    <select class="ml-select" name="payment_status" required>
                        <option value="belum_bayar">belum_bayar</option>
                        <option value="sudah_bayar">sudah_bayar</option>
                    </select>
                </div>

                <div class="ml-field">
                    <label class="ml-label">Laundry Status</label>
                    <select class="ml-select" name="laundry_status" required>
                        <option value="diproses">diproses</option>
                        <option value="selesai">selesai</option>
                        <option value="sudah_diambil">sudah_diambil</option>
                    </select>
                </div>

                <div class="ml-span-2">
                    <button class="ml-btn" type="submit">
                        <i data-lucide="check"></i>
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
