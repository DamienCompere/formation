@extends('layouts.master')
@section('content')

<div class="container">
    <h1>{{$post->title}}</h1>
    @forelse($post->categories as $category)
        <h2>{{$category->name}}</h2>
        @empty
        <h2>Pas de catégorie</h2>
    @endforelse
    <div>
        <img src="{{ url('images', $post->picture->link) }}" alt="">
    </div>

    <div>
        <p>Type : {{$post->post_type}}</p>
    </div>
   
    <div>
        <p>Date de début : {{$post->start_date}}</p>
    </div>

    <div>
        <p>Date de fin : {{$post->end_date}}</p>
    </div>

    <div>
        <p>Prix : {{$post->price}}€</p>
    </div>

     <div>
        <p>Nombre d'étudiant max : {{$post->nb_max}}</p>
    </div>

    <div>
        <p>Description : {{$post->description}}</p>
    </div>
</div>


@endsection
