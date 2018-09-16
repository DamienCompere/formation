@extends('layouts.master')

@section('content')

<h1>{{ $post->post_type }} : {{ $post->title }} </h1>

@forelse($post->categories as $category)
    {{ $category->name }}
@empty
@endforelse



<div class="content">
    @if($post->picture)
        <img src="{{ url('images', $post->picture->link) }}" alt=""></li>
    @endif

    <p> {{ $post->description }} </p>
</div>
<div class="content">
    <p>Date de début : {{ \Carbon\Carbon::parse($post->start_date)->format('d/m/Y') }} </p>
    <p>Date de fin :  {{ \Carbon\Carbon::parse($post->end_date)->format('d/m/Y') }} </p>
    <p> Prix : {{ $post->price }} $</p>
    <p>Nombre max :  {{ $post->nb_max }} </p>
    <p>Statut :  {{ $post->status }} </p>
</div>
@endsection