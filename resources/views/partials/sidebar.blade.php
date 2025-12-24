<aside class="ml-sidebar">
    <div class="ml-brand">
        <img src="{{ asset('MyLaundry-Logo.png') }}" alt="MyLaundry Logo" class="ml-brand__logo">
        <div class="ml-brand__text">
            <div class="ml-brand__title">MyLaundry</div>
            <div class="ml-brand__subtitle">Cashier Dashboard</div>
        </div>
    </div>

    <div class="ml-profile">
        <div class="ml-profile__row">
            <div class="ml-avatar" title="Avatar">
                <i data-lucide="user"></i>
            </div>
            <div>
                <div class="ml-profile__name">{{ auth()->user()->name }}</div>
                <div class="ml-profile__meta">{{ auth()->user()->role?->name }}</div>
            </div>
        </div>
    </div>

    <nav class="ml-nav">
        <a class="ml-nav__item {{ request()->routeIs('dashboard') ? 'is-active' : '' }}" href="{{ route('dashboard') }}">
            <span class="ml-nav__icon"><i data-lucide="layout-dashboard"></i></span>
            <span class="ml-nav__label">Dashboard</span>
        </a>

        @if(auth()->user()->isAdmin())
            <a class="ml-nav__item {{ request()->routeIs('admin.orders.*') ? 'is-active' : '' }}" href="{{ route('admin.orders.index') }}">
                <span class="ml-nav__icon"><i data-lucide="washing-machine"></i></span>
                <span class="ml-nav__label">Laundry</span>
            </a>

            <a class="ml-nav__item {{ request()->routeIs('profile') ? 'is-active' : '' }}" href="{{ route('profile') }}">
                <span class="ml-nav__icon"><i data-lucide="id-card"></i></span>
                <span class="ml-nav__label">Profil</span>
            </a>

            <a class="ml-nav__item {{ request()->routeIs('calendar') ? 'is-active' : '' }}" href="{{ route('calendar') }}">
                <span class="ml-nav__icon"><i data-lucide="calendar"></i></span>
                <span class="ml-nav__label">Calendar</span>
            </a>

            <a class="ml-nav__item {{ request()->routeIs('admin.orders.create') ? 'is-active' : '' }}" href="{{ route('admin.orders.create') }}">
                <span class="ml-nav__icon"><i data-lucide="file-plus"></i></span>
                <span class="ml-nav__label">Buat Order</span>
            </a>
        @else
            <a class="ml-nav__item {{ request()->routeIs('profile') ? 'is-active' : '' }}" href="{{ route('profile') }}">
                <span class="ml-nav__icon"><i data-lucide="id-card"></i></span>
                <span class="ml-nav__label">Profil</span>
            </a>

            <a class="ml-nav__item {{ request()->routeIs('orders.my') ? 'is-active' : '' }}" href="{{ route('orders.my') }}">
                <span class="ml-nav__icon"><i data-lucide="clipboard-list"></i></span>
                <span class="ml-nav__label">My Orders</span>
            </a>

            <a class="ml-nav__item {{ request()->routeIs('orders.history') ? 'is-active' : '' }}" href="{{ route('orders.history') }}">
                <span class="ml-nav__icon"><i data-lucide="clock"></i></span>
                <span class="ml-nav__label">Order History</span>
            </a>
        @endif

        <div class="ml-nav__section">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="ml-nav__item" type="submit">
                    <span class="ml-nav__icon"><i data-lucide="log-out"></i></span>
                    <span class="ml-nav__label">Logout</span>
                </button>
            </form>
        </div>
    </nav>
</aside>
