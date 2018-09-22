@extends('layouts.master')

@section('content')

<!-- barre de recherche -->
    <h1>Page de recherche</h1>

    
<div class="container">

    {{$posts->links()}}

<table class="table">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Lien</th>
        </tr>
    </thead>
    <tbody>
    @forelse($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->description }}</td>
            <td><a href="{{route('post.show',$post->id)}}" class="btn btn-info">Voir</a></td>            
        </tr>
    @empty
    <tr>
        <td>Pas de livre</td>
    </tr>
     @endforelse
    </tbody>
    <tfoot>
    
    </tfoot>

</table>
{{$posts->links()}}
</div>

@endsection
