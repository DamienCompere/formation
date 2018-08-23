@extends('layouts.master')

@section('content')

<!-- barre de recherche -->
<div class="container">

    <h1>Les dernières annonces </h1>

    <ul class="list-group">
    @forelse ($posts as $post)
        <li class="list-group-item"><h2><a href="{{ url('post', $post->id) }}">{{$post->title}}</a></h2></li>
        <li>
        @if($post->picture)
        <img src="{{ url('images', $post->picture->link) }}" alt=""></li>
        @endif
        <li class="list-group-item">Date de début :{{ $post->start_date }}</li>
        <li class="list-group-item">Date de fin : {{$post->end_date}}</li>
        <li class="list-group-item">{{$post->description}}</li>
        @empty 
        <li>Pas de livre pour l'instant</li>
    @endforelse
    </ul>
</div>
@endsection
