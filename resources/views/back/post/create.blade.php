@extends('layouts.master')
@section('content')

<h1>Creation d'une formation</h1>

<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}

     <div class="form-group">
        <label for="post_type">Formation :</label>
        <select class="form-control" id="post_type" name="post_type">
           @forelse($posts as $id => $post_type )
                <option  {{ old('post_type') == $id ? 'selected' : ''}} value="{{ $id }}">{{$post_type}}</option>
           @empty
           @endforelse
        </select>
    </div>

    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
        @if($errors->has('title'))
            <span class="error">{{$errors->first('title')}}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" rows="5" id="description" name="description">{{old('description')}}</textarea>
        @if($errors->has('description')) 
            <span class="error">{{$errors->first('description')}}</span>
        @endif
    </div>
    
    <div class="form-group">
        <label for="start_date">Date de début</label>
        <input type="date" class="form-control" id="start_date" name="start_date" value="{{old('start_date')}}">
        @if($errors->has('start_date'))
            <span class="error">{{$errors->first('start_date')}}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="end_date">Date de fin</label>
        <input type="date" class="form-control" id="end_date" name="end_date" value="{{old('end_date')}}">
        @if($errors->has('end_date'))
            <span class="error">{{$errors->first('end_date')}}</span>
        @endif
    </div>

    <div class="checkbox">
        <p>Categories</p>
        @forelse($categories as $id => $name)
            <label><input {{ (!empty(old('categories')) && in_array( $id, old('categories')) ) ? 'checked' : '' }} type="checkbox" value="{{$id}}" name="categories[]" id="category{{$id}}">{{$name}}</label>
        @empty
        @endforelse
    </div>
    <div class="form-group">
        <label for="price">Prix</label>
        <input type="number" class="form-control" id="price" name="price" value="{{old('price')}}" min="1">
        @if($errors->has('price'))
            <span class="error">{{$errors->first('price')}}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="nb_max">Nombre max </label>
        <input type="number" class="form-control" id="nb_max" name="nb_max" value="{{old('nb_max')}}" min="1" step="1">
        @if($errors->has('nb_max'))
            <span class="error">{{$errors->first('nb_max')}}</span>
        @endif
    </div>

    <p>Status</p>
    <label class="radio-inline"><input type="radio" name="status" value="published" {{old('status') == "published" ? 'checked' : ''}}>Published</label>
    <label class="radio-inline"><input type="radio" name="status" value="unpublished" {{old('status') == "unpublished" ? 'checked' : ''}}>Unpublished</label>
    <br>
    @if($errors->has('status'))
        <span class="error">{{$errors->first('status')}}</span>
    @endif

    <br> 

    <p>File</p>
    <input type="file" id="picture" name="picture" accept=""> 
    <br>
  <button type="submit" class="btn btn-primary btn-lg">Envoyer</button>

</form>


@endsection
