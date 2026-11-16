@extends('layouts.app')

@section('title', 'Переулок — маршруты, которые начинаются с поворота')

@section('content')
<section class="hero wrap">
    <div class="hero-copy">
        <div class="eyebrow"><span class="eyebrow-line"></span> маршрутное бюро · выпуск № 01</div>
        <h1>Город начинается<br>там, где ты <em>свернул.</em></h1>
        <p class="hero-lead">Небольшие прогулки по Москве — без гонки за достопримечательностями. С вниманием к дворам, переходам и деталям, мимо которых обычно проходят.</p>
        <div class="hero-actions">
            <a class="button button-dark" href="{{ route('walks.index') }}">Выбрать маршрут <span>↗</span></a>
            <a class="text-link" href="{{ route('journal.index') }}">Сначала почитать <span>→</span></a>
        </div>
        <div class="hero-meta"><span><b>{{ $walkCount }}</b> маршрутов в тетради</span><span>·</span><span>от 45 минут</span><span>·</span><span>без спешки</span></div>
    </div>
    <div class="hero-art" aria-label="Схематичная линия прогулки">
        <div class="art-note note-top">не обязательно<br>идти прямо</div>
        <svg class="route-drawing" viewBox="0 0 520 540" role="img" aria-label="Линия маршрута с несколькими поворотами">
            <path class="map-line pale" d="M90 50 C160 105 235 65 240 150 S135 230 205 290 S390 250 390 355 S285 435 340 495" />
            <path class="map-line ink" d="M90 50 C160 105 235 65 240 150 S135 230 205 290 S390 250 390 355 S285 435 340 495" />
            <circle class="map-point" cx="90" cy="50" r="10"/><circle class="map-point" cx="240" cy="150" r="7"/><circle class="map-point" cx="205" cy="290" r="7"/><circle class="map-point" cx="390" cy="355" r="7"/><circle class="map-point end" cx="340" cy="495" r="11"/>
            <path class="map-cross" d="M35 180h90M80 145v70M355 80h90M400 45v70M90 410h95M137 365v90"/>
            <text x="115" y="34" class="map-label">СТАРТ</text><text x="365" y="520" class="map-label">ТЫ ЗДЕСЬ</text>
        </svg>
        <div class="art-note note-bottom">смотреть<br>по сторонам ↗</div>
        <div class="art-stamp"><span>небольшой</span><b>крюк</b><span>к лучшему</span></div>
    </div>
    <div class="hero-index">55°45′ N<br>37°37′ E</div>
</section>

<section class="section wrap">
    <div class="section-heading"><div><div class="eyebrow">01 / выбрать направление</div><h2>Маршруты с характером</h2></div><a class="text-link" href="{{ route('walks.index') }}">Все маршруты <span>↗</span></a></div>
    <div class="walk-grid">
        @foreach ($featuredWalks as $walk)
            @include('walks.card', ['walk' => $walk, 'number' => str_pad($loop->iteration, 2, '0', STR_PAD_LEFT)])
        @endforeach
    </div>
</section>

<section class="interlude wrap">
    <div class="interlude-index">ЗАПИСКА<br>НА ПОЛЯХ</div>
    <p>«Хороший маршрут — это не самый короткий путь. Это путь, после которого хочется ещё немного пройтись».</p>
    <div class="interlude-sign">— из блокнота редакции</div>
</section>

<section class="calculator-band">
    <div class="wrap calculator-inner">
        <div class="calculator-intro"><div class="eyebrow eyebrow-light">02 / подстроить под себя</div><h2>Сколько времени<br>есть у тебя?</h2><p>Укажи расстояние, свой темп и остановки. Посчитаем ориентир — без обещаний уложиться в секунду.</p><a class="button button-paper" href="{{ route('estimate') }}">Открыть расчёт <span>↗</span></a></div>
        <div class="calculator-visual"><div class="calc-big">4,2<span>км</span></div><div class="calc-underline"></div><div class="calc-small"><span>средний темп</span><b>4,5 км/ч</b></div><div class="calc-result"><span>примерно</span><strong>66 мин</strong><small>с одной паузой на кофе</small></div><div class="calc-ring">↗</div></div>
    </div>
</section>

<section class="section wrap journal-preview">
    <div class="section-heading"><div><div class="eyebrow">03 / заметки в пути</div><h2>Журнал наблюдений</h2></div><a class="text-link" href="{{ route('journal.index') }}">Читать журнал <span>↗</span></a></div>
    <div class="journal-grid">
        @foreach ($latestArticles as $article)
            <a class="journal-card" href="{{ route('journal.show', $article->slug) }}"><div class="journal-card-top"><span>{{ $article->category }}</span><span>{{ $article->read_minutes }} мин чтения</span></div><h3>{{ $article->title }}</h3><p>{{ $article->excerpt }}</p><span class="journal-arrow">Читать заметку ↗</span></a>
        @endforeach
    </div>
</section>
@endsection
