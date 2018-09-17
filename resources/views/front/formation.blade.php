@extends('layouts.master')
@section('content')

<div class="container">
    <h1>Formation</h1>
    @forelse ($posts as $post)
        <p>Titre : {{$post->title}}</p>
        <div class="content">
            @if($post->picture)
                <img src="{{ url('images', $post->picture->link) }}" alt=""></li>
            @endif
            <p>Description : {{$post->description}}</p>
        </div>
        <div class="content">
            <p>Date de début : {{ \Carbon\Carbon::parse($post->start_date)->format('d/m/Y') }}</p>
            <p>Date de fin : {{ \Carbon\Carbon::parse($post->end_date)->format('d/m/Y') }}</p>
            <p>Prix : {{$post->price}}$</p>
            <p>Nombre max d'étudiant : {{$post->nb_max}}</p>
        </div>     
        <p>Catégorie :</p>
        @forelse($post->categories as $category)
            <ul>
                <li>{{$category->name}}</li>
            </ul>
            @empty
            <p>Pas de catégorie</p>
        @endforelse 
        <hr class="article">
        @empty
        <p>Pas de proposition de stage</p>
    @endforelse

</div>
@endsection
