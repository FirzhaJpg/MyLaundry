<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'MyLaundry') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/mylaundry-dashboard.css') }}">
</head>
<body>
<div class="ml-shell">
    @auth
        @include('partials.sidebar')

        <div class="ml-content">
            @include('partials.topbar', ['title' => trim($__env->yieldContent('page_title')) ?: 'Dashboard'])

            <div class="ml-main">
                @yield('content')
            </div>
        </div>
    @else
        <div class="ml-auth">
            @yield('content')
        </div>
    @endauth
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
@if(request()->routeIs('admin.orders.create'))
    <script src="{{ asset('js/price-format.js') }}"></script>
@endif
</body>
</html>
