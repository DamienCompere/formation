@extends('layouts.master')
@section('content')

{{$posts->links()}}

<a href="{{route('post.create')}}"><button type="button" class="btn btn-primary">Ajouter une formation</button></a>

 @include('back.post.partials.flash')


<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Description</th>
            <th>Categorie</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Prix</th>
            <th>Nombre max d'élève</th>
            <th>Status</th>
            <th>Show</th>
            <th>Editer</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($posts as $post)

        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->post_type }}</td>
            <td>{{ $post->description }}</td>
            <td>
                @forelse($post->categories as $category)
                    <ul>
                        <li>{{$category->name}}</li>
                    </ul>
                @empty
                    pas de catégorie
                @endforelse
            </td>
            <td>{{ $post->start_date }}</td>
            <td>{{ $post->end_date }}</td>
            <td>{{$post->price}}$</td>
            <td>{{ $post->nb_max }}</td>
            <td>{{ $post->status }}</td>
            <td><a href="{{route('post.show',$post->id)}}">Voir</a></td>  
            <td><a href="#">Editer</a></td>       
            <td><a href="#">Supprimer</a></td>            
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


@endsection
