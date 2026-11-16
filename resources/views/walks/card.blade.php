<article class="walk-card accent-{{ $walk->accent }}">
    <a class="walk-card-link" href="{{ route('walks.show', $walk->slug) }}" aria-label="Открыть маршрут: {{ $walk->title }}">
        <div class="walk-card-art">
            <span class="walk-number">{{ $number ?? '—' }}</span>
            <span class="walk-district">{{ $walk->district }}</span>
            <svg viewBox="0 0 340 190" aria-hidden="true"><path d="M10 145 C65 145 58 45 130 65 S192 175 245 110 S286 35 330 49"/><circle cx="10" cy="145" r="5"/><circle cx="130" cy="65" r="4"/><circle cx="245" cy="110" r="4"/><circle cx="330" cy="49" r="5"/></svg>
            <span class="walk-card-sticker">сверни<br>здесь ↗</span>
        </div>
        <div class="walk-card-body"><div class="walk-meta"><span>{{ $walk->difficulty }}</span><span>{{ $walk->distance_km }} км</span><span>{{ $walk->duration_minutes }} мин</span></div><h3>{{ $walk->title }}</h3><p>{{ $walk->teaser }}</p><div class="card-bottom"><span>Открыть маршрут</span><span>↗</span></div></div>
    </a>
</article>
