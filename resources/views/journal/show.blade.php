@extends('layouts.app')

@section('title', $article->title.' — Журнал «Переулок»')

@section('content')
<article class="article-page wrap"><div class="eyebrow"><a href="{{ route('journal.index') }}">ЖУРНАЛ</a> / {{ mb_strtoupper($article->category) }}</div><header class="article-header"><div class="article-kicker">{{ $article->published_at?->translatedFormat('d F Y') }} · {{ $article->read_minutes }} МИН ЧТЕНИЯ</div><h1>{{ $article->title }}</h1><p>{{ $article->excerpt }}</p></header><div class="article-body">{!! nl2br(e($article->body)) !!}</div><div class="article-after"><span>конец заметки</span><a href="{{ route('journal.index') }}" class="text-link">К другим текстам ↗</a></div></article>
@endsection
