@extends('layouts.app')

@section('title', 'Маршруты — Переулок')

@section('content')
<section class="page-hero wrap page-hero-small"><div class="eyebrow">АРХИВ ПРОГУЛОК / 01</div><h1>Выбери свой<br><em>поворот.</em></h1><p>Не обязательно планировать весь день. Иногда достаточно часа и одного хорошего повода выйти.</p></section>
<section class="wrap catalog-section">
    <form class="filters" method="get" action="{{ route('walks.index') }}">
        <div class="filter-label"><span class="filter-icon">⌕</span><b>Подобрать</b><small>по настроению и времени</small></div>
        <label>Район<select name="district"><option value="">Любой район</option>@foreach ($districts as $district)<option value="{{ $district }}" @selected(($filters['district'] ?? '') === $district)>{{ $district }}</option>@endforeach</select></label>
        <label>Не дольше<select name="max_minutes"><option value="">Без ограничения</option>@foreach ([45,60,90,120,180] as $minutes)<option value="{{ $minutes }}" @selected((string)($filters['max_minutes'] ?? '') === (string)$minutes)>{{ $minutes }} минут</option>@endforeach</select></label>
        <label>Сложность<select name="difficulty"><option value="">Любая</option><option value="лёгкий" @selected(($filters['difficulty'] ?? '') === 'лёгкий')>Лёгкая</option><option value="средний" @selected(($filters['difficulty'] ?? '') === 'средний')>Средняя</option></select></label>
        <button class="button button-dark filter-submit" type="submit">Показать <span>↗</span></button>
        @if (count(array_filter($filters)))<a class="filter-reset" href="{{ route('walks.index') }}">Сбросить</a>@endif
    </form>
    <div class="catalog-caption"><span>{{ $walks->total() }} маршрутов найдено</span><span>сначала короткие</span></div>
    @if ($walks->count())
        <div class="walk-grid catalog-grid">
            @foreach ($walks as $walk)
                @include('walks.card', ['walk' => $walk, 'number' => str_pad(($walks->firstItem() ?? 1) + $loop->index, 2, '0', STR_PAD_LEFT)])
            @endforeach
        </div>
        <div class="pagination-wrap">{{ $walks->links() }}</div>
    @else
        <div class="empty-state"><span>↗</span><h2>Пока не нашли такой маршрут</h2><p>Попробуй убрать одно из условий или посмотреть весь архив.</p><a class="text-link" href="{{ route('walks.index') }}">Сбросить фильтры →</a></div>
    @endif
</section>
@endsection
