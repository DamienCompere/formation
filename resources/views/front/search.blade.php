@extends('layouts.master')

@section('content')

<!-- barre de recherche -->
<div class="container">
    <h1>Page de recherche</h1>
    @if(isset($details))
        <p>Le résultat de la recherche {{$query}} est :</p>
        @forelse($details as $post)

        <p>{{$post->title}}</p>

        @empty
        @endforelse

    @endif
</div>
@endsection
