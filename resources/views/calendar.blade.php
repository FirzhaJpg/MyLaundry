@extends('layouts.app')

@section('page_title', 'Calendar')

@section('content')
    <div class="ml-grid">
        <!-- Add Schedule Form -->
        <div class="ml-card ml-col-4">
            <div class="ml-card__header">
                <div class="ml-card__title">Tambah Jadwal Pengiriman</div>
                <i data-lucide="plus-circle"></i>
            </div>
            <div class="ml-card__body">
                @if(session('success'))
                    <div class="ml-alert ml-alert--success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('calendar') }}" class="ml-form-grid">
                    @csrf
                    <div class="ml-field ml-span-2">
                        <label class="ml-label">Order</label>
                        <select class="ml-select" name="order_id" required>
                            <option value="" disabled selected>Pilih Order</option>
                            @foreach($orders as $order)
                                <option value="{{ $order->id }}">
                                    #{{ $order->id }} - {{ $order->customer_name }} ({{ $order->service_type }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="ml-field">
                        <label class="ml-label">Tanggal Pengiriman</label>
                        <input class="ml-input" name="delivery_date" type="date" required>
                    </div>

                    <div class="ml-field">
                        <label class="ml-label">Waktu Pengiriman</label>
                        <input class="ml-input" name="delivery_time" type="time" required>
                    </div>

                    <div class="ml-field ml-span-2">
                        <label class="ml-label">Alamat Pengiriman</label>
                        <input class="ml-input" name="customer_address" required>
                    </div>

                    <div class="ml-field">
                        <label class="ml-label">No. Telepon</label>
                        <input class="ml-input" name="customer_phone" required>
                    </div>

                    <div class="ml-field ml-span-2">
                        <label class="ml-label">Catatan</label>
                        <textarea class="ml-input" name="notes" rows="3"></textarea>
                    </div>

                    <div class="ml-span-2">
                        <button class="ml-btn" type="submit">
                            <i data-lucide="plus"></i>
                            Tambah Jadwal
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Schedule List -->
        <div class="ml-card ml-col-8">
            <div class="ml-card__header">
                <div class="ml-card__title">Jadwal Pengiriman</div>
                <i data-lucide="calendar"></i>
            </div>
            <div class="ml-card__body">
                @if($schedules->count() > 0)
                    <table class="ml-table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Order</th>
                                <th>Customer</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schedules as $schedule)
                                <tr>
                                    <td>{{ $schedule->delivery_date->format('d/m/Y') }}</td>
                                    <td>{{ $schedule->delivery_time->format('H:i') }}</td>
                                    <td>
                                        <div>#{{ $schedule->order->id }}</div>
                                        <div class="ml-muted">{{ $schedule->order->service_type }}</div>
                                    </td>
                                    <td>
                                        <div>{{ $schedule->order->customer_name }}</div>
                                        <div class="ml-muted">{{ $schedule->customer_phone }}</div>
                                    </td>
                                    <td>{{ $schedule->customer_address }}</td>
                                    <td>
                                        <span class="ml-badge 
                                            @if($schedule->status === 'scheduled')ml-badge--scheduled
                                            @elseif($schedule->status === 'in_progress')ml-badge--processing
                                            @elseif($schedule->status === 'completed')ml-badge--completed
                                            @else ml-badge--cancelled @endif">
                                            {{ $schedule->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('calendar.update-status', $schedule) }}" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <select class="ml-select" name="status" onchange="this.form.submit()">
                                                <option value="scheduled" @selected($schedule->status === 'scheduled')>scheduled</option>
                                                <option value="in_progress" @selected($schedule->status === 'in_progress')>in_progress</option>
                                                <option value="completed" @selected($schedule->status === 'completed')>completed</option>
                                                <option value="cancelled" @selected($schedule->status === 'cancelled')>cancelled</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="ml-muted text-center py-20">
                        <i data-lucide="calendar-x" class="ml-image__icon"></i>
                        <div>Belum ada jadwal pengiriman</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
