@extends('layouts.master')
@section('content')

<div class="container">
    <h1>Formation</h1>
    @forelse ($posts as $post)
        @forelse($post->categories as $category)
            <h2>{{$category->name}}</h2>
            @empty
            <h2>Pas de catégorie</h2>
        @endforelse
        <img src="{{ url('images', $post->picture->link) }}" alt="">
        <p>Titre : {{$post->title}}</p>
        <p>Description : {{$post->description}}</p>
        <p>Date de début : {{$post->start_date}}</p>
        <p>Date de fin : {{$post->end_date}}</p>
        <p>Prix : {{$post->price}}</p>
        <p>Nombre max d'étudiant : {{$post->nb_max}}</p>
        @empty
        <p>Pas de proposition de stage</p>
    @endforelse

</div>


@endsection
