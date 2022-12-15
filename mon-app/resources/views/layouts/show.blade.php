@extends('layouts.app')

@section('title', 'L\'article '.$article->title)

@section('main')
    <h1>{{ $article->name }}</h1>
    <p>{{ $article->email }}</p>
    <p>{{ $article->lastname }}</p>
    <p>{{ $article->password }}</p>
    <p>{{ $article->pseudo }}</p>
@endsection
