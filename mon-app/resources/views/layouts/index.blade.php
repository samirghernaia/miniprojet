@extends('layouts.app')

@section('title', 'Liste des articles')

@section('main')
    @if(session()->has('message'))
        <div>
            {{ session()->get('message') }}
        </div>
    @endif
    <ul>
        @foreach ($articles as $article)
            <li>{{ $article->title }}</li>
        @endforeach
    </ul>
@endsection
