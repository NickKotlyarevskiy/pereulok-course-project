<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Переулок — небольшой городской журнал коротких прогулок по Москве.">
    <meta name="theme-color" content="#eee9df">
    <title>@yield('title', 'Переулок — маршруты, которые начинаются с поворота')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/mark.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>
    <div class="topline"><span>городской журнал прогулок</span><span>москва · не по открыткам</span></div>
    <header class="site-header">
        <a class="brand" href="{{ route('home') }}" aria-label="Переулок — на главную">
            <span class="brand-mark">п.</span>
            <span class="brand-word">переулок<span class="brand-dot">.</span><small>маршрутное бюро</small></span>
        </a>
        <button class="menu-toggle" type="button" aria-label="Открыть меню" aria-expanded="false">Меню <span>＋</span></button>
        <nav class="main-nav" aria-label="Основная навигация">
            <a href="{{ route('walks.index') }}" class="{{ request()->routeIs('walks.*') ? 'is-active' : '' }}">Маршруты</a>
            <a href="{{ route('journal.index') }}" class="{{ request()->routeIs('journal.*') ? 'is-active' : '' }}">Журнал</a>
            <a href="{{ route('estimate') }}" class="{{ request()->routeIs('estimate') ? 'is-active' : '' }}">Расчёт времени</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'is-active' : '' }}">О проекте</a>
        </nav>
        <a class="header-note" href="{{ route('suggestions.create') }}">Предложить маршрут <span>↗</span></a>
    </header>

    <main>
        @if (session('success'))
            <div class="flash-success" role="status"><span class="flash-mark">✓</span>{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="footer-top">
            <a class="brand brand-light" href="{{ route('home') }}"><span class="brand-mark">п.</span><span class="brand-word">переулок<span class="brand-dot">.</span><small>маршрутное бюро</small></span></a>
            <p>Не коллекция достопримечательностей.<br>Скорее — повод выйти из дома.</p>
            <a class="footer-idea" href="{{ route('suggestions.create') }}">Есть свой поворот? <span>Расскажи ↗</span></a>
        </div>
        <div class="footer-bottom"><span>учебный проект · 2026</span><span>сделано с вниманием к деталям</span><a href="{{ route('about') }}">Как устроен проект</a></div>
    </footer>
    <script src="{{ asset('js/site.js') }}" defer></script>
</body>
</html>
