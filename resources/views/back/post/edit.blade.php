@extends('layouts.master')
@section('content')

<h1>Modification d'une formation</h1>

<form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    @method('PUT')

     <div class="form-group">
        <label for="post_type">Formation :</label>
        <select class="form-control" id="post_type" name="post_type">
           <option value="stage" {{ $post->post_type === "stage" ? 'selected' :''}}>Stage</option>
           <option value="formation" {{ $post->post_type === "formation" ? 'selected' :''}}>Formation</option>
           <option value="undetermined" {{ $post->post_type === "undetermined" ? 'selected' :''}}>undetermined</option>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
        @if($errors->has('title'))
            <span class="error">{{$errors->first('title')}}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" rows="5" id="description" name="description">{{$post->description}}</textarea>
        @if($errors->has('description')) 
            <span class="error">{{$errors->first('description')}}</span>
        @endif
    </div>
    
    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input type="date" class="form-control" id="start_date" name="start_date" value="{{$post->start_date->format('Y-m-d') }}">
        @if($errors->has('start_date')) 
            <span class="error">{{$errors->first('start_date')}}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="end_date">End Date</label>
        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $post->end_date->format('Y-m-d') }}">
        @if($errors->has('end_date')) 
            <span class="error">{{$errors->first('end_date')}}</span>
        @endif
    </div>

    <div class="checkbox">
        <p>Categories</p>
            @forelse($categories as $id => $name)
                <label><input {{in_array($id, $post->categories()->pluck('id')->toArray()) ? 'checked' : ""}} type="checkbox" value="{{$id}}" name="categories[]" id="category{{$id}}">{{$name}}</label>
            @empty
            @endforelse
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{$post->price}}" min="1">
    </div>

    <div class="form-group">
        <label for="nb_max">Max number </label>
        <input type="number" class="form-control" id="nb_max" name="nb_max" value="{{$post->nb_max}}" min="1" step="1">
    </div>

    <p>Status</p>
    <label class="radio-inline"><input type="radio" name="status" value="published"{{$post->status == 'published' ? 'checked' : '' }}>Published</label>
    <label class="radio-inline"><input type="radio" name="status" value="unpublished" {{ $post->status == 'unpublished' ? 'checked' : '' }}>Unpublished</label>

    <br> 

    <p>Image</p>
    @if($post->picture)
        <img src="{{ url('images', $post->picture->link) }}" alt="$post->picture->link">
    @endif
    <input type="file" id="picture" name="picture" accept=""> 
    <br>
  <button type="submit" class="btn btn-dark">Modifier</button>

</form>

@endsection
