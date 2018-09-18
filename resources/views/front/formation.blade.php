@extends('layouts.master')
@section('content')

<h1>Offre de Formation</h1>
@forelse ($posts as $post)

    <div class="media border-bottom">
    <div class="media-left media-top">
    @if($post->picture)
        <img src="{{ url('images', $post->picture->link) }}" class="media" alt="$post->picture->link">
    @endif

    </div>
    <div class="media-body">
        <h4 class="media-heading ">{{$post->title}}</h4>
        <p>{{$post->description}}</p>
        <div class="list-group">
            <ul class="list-group">
                <li class="list-group-item ">Date de début : {{ ($post->start_date)->format('d/m/Y') }}</li>
                <li class="list-group-item">Date de fin : {{ ($post->end_date)->format('d/m/Y') }}</li>
                <li class="list-group-item">Prix : {{$post->price}}$</li>
                <li class="list-group-item">Nombre max d'étudiant : {{$post->nb_max}}</li>
                <li class="list-group-item active">Catégorie :  </li>
                @forelse($post->categories as $category)
                    <li class="list-group-item">{{ $category->name }} </li>
                @empty
                @endforelse
                <li class="list-group-item"><a href="{{ url('post', $post->id) }}" class="card-link btn btn-info">Afficher le poste complet </a>
    </li>
            </ul>
        </div>
    </div>
    </div>
@empty 
    <p>Pas de proposition de stage</p>
@endforelse


@endsection

