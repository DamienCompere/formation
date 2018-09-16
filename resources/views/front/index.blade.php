@extends('layouts.master')

@section('content')

<!-- barre de recherche -->
<div class="home">

    <h1>Formations / Stages </h1>

    <ul class="list-group">
    @forelse ($posts as $post)
        <li class="list-group-item"><h2><a href="{{ url('post', $post->id) }}">{{$post->title}}</a></h2></li>
        
        @if($post->picture)
            <li>
                <img src="{{ url('images', $post->picture->link) }}" alt="">
            </li>
        @endif
        <li class="list-group-item">{{$post->description}}</li>
        <li class="list-group-item">Date de début : {{ \Carbon\Carbon::parse($post->start_date)->format('d/m/Y') }}</li>
        <li class="list-group-item">Date de fin : {{ \Carbon\Carbon::parse($post->end_date)->format('d/m/Y') }}</li>
        <br>
        <hr class="article">
        @empty 
        <li>Pas de formations / Stages pour le moment</li>
    @endforelse
    </ul>
</div>
@endsection
