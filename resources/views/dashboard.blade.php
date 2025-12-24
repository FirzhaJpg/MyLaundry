@extends('layouts.app')

@section('page_title', 'Dashboard')

@section('content')
    <div class="ml-grid">
        <div class="ml-card ml-col-12">
            <div class="ml-card__header">
                <div class="ml-card__title">Welcome</div>
            </div>
            <div class="ml-card__body">
                <div class="ml-muted">Selamat datang di MyLaundry. Gunakan dashboard ini untuk monitoring order secara real-time.</div>

                <div class="ml-flex ml-flex-wrap ml-gap-10 ml-mt-14">
                    @if(auth()->user()->isAdmin())
                        <a class="ml-btn" href="{{ route('admin.orders.index') }}">
                            <i data-lucide="washing-machine"></i>
                            Lihat Semua Order
                        </a>
                        <a class="ml-btn ml-btn--ghost" href="{{ route('admin.orders.create') }}">
                            <i data-lucide="file-plus"></i>
                            Buat Order
                        </a>
                    @else
                        <a class="ml-btn" href="{{ route('orders.my') }}">
                            <i data-lucide="clipboard-list"></i>
                            Lihat Order Saya
                        </a>
                        <a class="ml-btn ml-btn--ghost" href="{{ route('orders.history') }}">
                            <i data-lucide="clock"></i>
                            Riwayat
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="ml-card ml-col-4">
            <div class="ml-card__header">
                <div class="ml-card__title">Summary</div>
                <i data-lucide="bar-chart-3"></i>
            </div>
            <div class="ml-card__body">
                <div class="ml-grid" style="grid-template-columns: repeat(12, 1fr); gap: 10px;">
                    <div class="ml-col-12 ml-field">
                        <div class="ml-label">Total Orders</div>
                        <div class="ml-strong">{{ $stats['total'] }}</div>
                    </div>
                    <div class="ml-col-6 ml-field">
                        <div class="ml-label">Belum Bayar</div>
                        <div class="ml-strong">{{ $stats['belum_bayar'] }}</div>
                    </div>
                    <div class="ml-col-6 ml-field">
                        <div class="ml-label">Diproses</div>
                        <div class="ml-strong">{{ $stats['diproses'] }}</div>
                    </div>
                    <div class="ml-col-6 ml-field">
                        <div class="ml-label">Selesai</div>
                        <div class="ml-strong">{{ $stats['selesai'] }}</div>
                    </div>
                    <div class="ml-col-6 ml-field">
                        <div class="ml-label">Sudah Diambil</div>
                        <div class="ml-strong">{{ $stats['sudah_diambil'] }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ml-card ml-col-8">
            <div class="ml-card__header">
                <div class="ml-card__title">Trend Orders (7 Hari Terakhir)</div>
                <i data-lucide="line-chart"></i>
            </div>
            <div class="ml-card__body">
                <div class="ml-image ml-image--square" style="height: 240px;">
                    <div class="ml-image__inner">
                        <i data-lucide="trending-up" class="ml-image__icon"></i>
                        <div>Chart akan muncul di sini (area chart omzet/order per hari)</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
