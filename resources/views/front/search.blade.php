@extends('layouts.master')

@section('content')

<!-- barre de recherche -->
<div class="container">
    <h1>Page de recherche</h1>
    {{$posts->links()}}
    <ul>
    @forelse($posts as $post)
    <li>{{ $post->title }}</li>
    @empty 
    <li>désolé aucun résultat</li>
    @endforelse
    </ul>
    {{$posts->links()}}
    
</div>
@endsection
