@extends('layouts.master')
@section('content')

{{$posts->links()}}
<div class="searchbar">
        @include('back.post.partials.searchBarBack')
</div>
<a href="{{route('post.create')}}"><button type="button" class="btn btn-primary">Ajouter une formation</button></a>

 @include('back.post.partials.flash')


<table class="table table-responsive">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Type</th>
            <th>Categorie</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Prix</th>
            <th>Nombre max d'élève</th>
            <th>Statut</th>
            <th>Détails</th>
            <th>Editer</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($posts as $post)

        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->post_type == "undetermined" ? "Indéterminé" : $post->post_type}}</td>
            <td>
                @forelse($post->categories as $category)
                    <ul>
                        <li>{{$category->name}}</li>
                    </ul>
                @empty
                    pas de catégorie
                @endforelse
            </td>
            <td>{{ $post->start_date->format('d/m/Y')  }}</td>
            <td>{{ $post->end_date->format('d/m/Y') }}</td>
            <td>{{$post->price}}€</td>
            <td>{{ $post->nb_max }}</td>
            <td> {{$post->status == "published" ? "Publié" : "Non publié"}}</td>
            <td><a href="{{route('post.show',$post->id)}}" class="btn btn-info">Voir</a></td>  
            <td><a href="{{route('post.edit',$post->id)}}" class="btn btn-dark">Editer</a></td>       
            <td>
                <form class="delete" action="{{route('post.destroy', $post->id)}}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>            
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
@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection


@endsection
