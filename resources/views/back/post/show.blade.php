@extends('layouts.master')

@section('content')

<h1>{{ $post->post_type }} : {{ $post->title }} </h1>

<div class="media border-bottom">
  <div class="media-left media-top">
  @if($post->picture)
      <img src="{{ url('images', $post->picture->link) }}" class="media" alt="$post->picture->link">
  @endif
  </div>
  <div class="media-body">
    <p>{{$post->description}}</p>
    <div class="list-group">
        <ul class="list-group">
            <li class="list-group-item">Type : {{$post->post_type}}</li>
            <li class="list-group-item ">Date de début : {{ ($post->start_date)->format('d/m/Y') }}</li>
            <li class="list-group-item">Date de fin : {{ ($post->end_date)->format('d/m/Y') }}</li>
            <li class="list-group-item">Prix : {{$post->price}}$</li>
            <li class="list-group-item">Nombre d'étudiant max : {{$post->nb_max}}</li>
            <li class="list-group-item active">Catégorie(s) :</li>
            @forelse($post->categories as $category)
              <li class="list-group-item"><b>{{ $category->name }}</b></li>
            @empty
              <li>Pas de catégorie</li>
            @endforelse
        </ul>
    </div>
</div>
  
@endsection