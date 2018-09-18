@extends('layouts.master')

@section('content')

<!-- barre de recherche -->
<div class="searchbar">
        @include('partials.searchBar')
</div>
<h1>Formations / Stages </h1>
<!-- Affichage des deux derniers posts  -->
<div class="card border-primary mb-3" style="width: 38rem;">
    @forelse ($posts as $post)
        @if($post->picture)
            <img class="card-img-top img-thumbnail" src="{{ url('images', $post->picture->link) }}" alt="Card image cap">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{$post->description}}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Date de début : {{ ($post->start_date)->format('d/m/Y') }}</li>
            <li class="list-group-item">Date de fin : {{ ($post->end_date)->format('d/m/Y') }}</li>
        </ul>
        <div class="card-body">
            <a href="{{ url('post', $post->id) }}" class="card-link btn btn-info">Afficher le poste complet </a>
        </div>
        @empty
    @endforelse
</div>






@endsection
