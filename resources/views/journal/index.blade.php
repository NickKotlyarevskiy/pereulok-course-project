@extends('layouts.app')

@section('title', 'Журнал — Переулок')

@section('content')
<section class="page-hero wrap page-hero-small"><div class="eyebrow">ПОЛЕВЫЕ ЗАМЕТКИ / 02</div><h1>Читать город<br><em>между строк.</em></h1><p>Короткие тексты о привычке смотреть внимательнее. Без путеводительного тона и обязательного списка мест.</p></section>
<section class="wrap journal-list-section"><div class="journal-list-top"><span>{{ $articles->total() }} заметки</span><span>архив редакции</span></div><div class="journal-list">@foreach ($articles as $article)<article class="journal-list-item"><div class="journal-date"><span>{{ $article->published_at?->format('d') }}</span><small>{{ mb_strtoupper($article->published_at?->translatedFormat('M') ?? '') }}</small></div><div class="journal-list-copy"><div class="article-kicker">{{ $article->category }} · {{ $article->read_minutes }} МИН ЧТЕНИЯ</div><h2><a href="{{ route('journal.show', $article->slug) }}">{{ $article->title }}</a></h2><p>{{ $article->excerpt }}</p><a class="text-link" href="{{ route('journal.show', $article->slug) }}">Открыть заметку <span>↗</span></a></div><div class="journal-list-arrow">↗</div></article>@endforeach</div><div class="pagination-wrap">{{ $articles->links() }}</div></section>
@endsection
