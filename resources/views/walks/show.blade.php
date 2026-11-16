@extends('layouts.app')

@section('title', $walk->title.' — Переулок')

@section('content')
<section class="detail-hero wrap accent-{{ $walk->accent }}">
    <div class="eyebrow"><a href="{{ route('walks.index') }}">МАРШРУТЫ</a> / {{ mb_strtoupper($walk->district) }}</div>
    <div class="detail-hero-grid"><div><h1>{{ $walk->title }}</h1><p class="detail-lead">{{ $walk->teaser }}</p><div class="detail-meta"><span>{{ $walk->distance_km }} км</span><span>{{ $walk->duration_minutes }} минут</span><span>{{ $walk->difficulty }}</span></div></div><div class="detail-map"><svg viewBox="0 0 480 340" aria-label="Схема направления маршрута"><path d="M35 265 C100 240 85 110 180 120 S260 270 310 180 S390 50 450 75"/><circle cx="35" cy="265" r="8"/><circle cx="180" cy="120" r="6"/><circle cx="310" cy="180" r="6"/><circle cx="450" cy="75" r="8"/></svg><span class="map-start">СТАРТ</span><span class="map-finish">ФИНИШ</span></div></div>
</section>
<section class="wrap detail-content">
    <div class="detail-main"><div class="eyebrow">О ЧЁМ ЭТА ПРОГУЛКА</div><p class="detail-description">{{ $walk->description }}</p><div class="route-stops"><div class="eyebrow">ПОРЯДОК ОСТАНОВОК</div>@foreach ($walk->stops as $stop)<div class="stop-row"><span class="stop-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><div><h3>{{ $stop['name'] }}</h3><p>{{ $stop['note'] }}</p></div></div>@endforeach</div></div>
    <aside class="detail-aside"><div class="route-ticket"><span class="ticket-overline">КАРТОЧКА МАРШРУТА</span><div class="ticket-distance">{{ $walk->distance_km }}<small>км</small></div><div class="ticket-line"></div><dl><div><dt>Начало</dt><dd>{{ $walk->start_point }}</dd></div><div><dt>Финиш</dt><dd>{{ $walk->finish_point }}</dd></div><div><dt>Время</dt><dd>{{ $walk->duration_minutes }} мин</dd></div></dl><a class="button button-dark button-full" href="{{ route('estimate', ['distance' => $walk->distance_km, 'pace' => 4.5, 'pause' => 15]) }}">Рассчитать под себя ↗</a></div><p class="route-disclaimer">Маршрутные карточки — учебные демонстрационные материалы. Перед прогулкой проверь актуальную доступность проходов и территорий.</p></aside>
</section>
@if ($relatedWalks->isNotEmpty())<section class="section wrap"><div class="section-heading"><div><div class="eyebrow">ЕЩЁ В ЭТОМ РАЙОНЕ</div><h2>Можно продолжить</h2></div></div><div class="walk-grid">@foreach ($relatedWalks as $walk)@include('walks.card', ['walk' => $walk, 'number' => str_pad($loop->iteration,2,'0',STR_PAD_LEFT)])@endforeach</div></section>@endif
@endsection
