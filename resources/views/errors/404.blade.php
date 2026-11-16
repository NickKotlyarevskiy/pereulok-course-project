@extends('layouts.app')
@section('title', 'Страница не найдена — Переулок')
@section('content')
<section class="empty-state wrap"><span>404</span><h1>Кажется, здесь тупик.</h1><p>Такой страницы нет, но прогулку можно продолжить с главной.</p><a class="button button-dark" href="{{ route('home') }}">На главную ↗</a></section>
@endsection
