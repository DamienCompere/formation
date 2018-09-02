@extends('layouts.master')

@section('content')

<h1>{{ $post->post_type }} : {{ $post->title }} </h1>

@forelse($post->categories as $category)
    {{ $category->name }}
@empty
@endforelse
<p> {{ $post->start_date }} </p>
<p> {{ $post->end_date }} </p>
<p> {{ $post->price }} $</p>
<p> {{ $post->nb_max }} </p>
<p> {{ $post->status }} </p>

<p> {{ $post->description }} </p>


<p>Image: </p>
@if($post->picture)
    <img src="{{ url('images', $post->picture->link) }}" alt=""></li>
@endif
@endsection