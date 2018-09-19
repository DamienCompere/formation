@extends('layouts.master')
@section('content')

<h1>Détail {{$post->title}}</h1>

<div class="card border-primary mb-3" style="width: 38rem;">
  <img class="card-img-top img-thumbnail" src="{{ url('images', $post->picture->link) }}" alt="{{$post->picture->link}}">
  <div class="card-body">
    <h5 class="card-title">{{$post->title}}</h5>
    <p class="card-text">{{$post->description}}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Type : {{$post->post_type}}</li>
    <li class="list-group-item">Date de début : {{ ($post->start_date)->format('d/m/Y') }}</li>
    <li class="list-group-item">Date de fin : {{ ($post->end_date)->format('d/m/Y') }}</li>
    <li class="list-group-item">Prix : {{$post->price}}$</li>
    <li class="list-group-item">Nombre d'étudiant max : {{$post->nb_max}}</li>
  </ul>
  <div class="card-body">
    <p>Catégorie :</p>
    @forelse($post->categories as $category)
        <ul>
            <li>{{ $category->name }}</li>
        </ul>
    @empty
    @endforelse
  </div>
</div>



@endsection
