@extends('layouts.master')
@section('content')

<div class="container">
    <h1>{{$post->title}}</h1>
    
    <div class="content">
        <img src="{{ url('images', $post->picture->link) }}" alt="">
        <p>Description : {{$post->description}}</p>
    </div>

    <div class="content">
        <p>Type : {{$post->post_type}}</p>
        <p>Date de début : {{ \Carbon\Carbon::parse($post->start_date)->format('d/m/Y') }}</p>
        <p>Date de fin : {{ \Carbon\Carbon::parse($post->end_date)->format('d/m/Y') }}</p>
        <p>Prix : {{$post->price}}$</p>
        <p>Nombre d'étudiant max : {{$post->nb_max}}</p>
    </div>
    <p>Catgéories</p>
@forelse($post->categories as $category)
    <ul>
        <li>{{ $category->name }}</li>
    </ul>
@empty
@endforelse
</div>

@endsection
