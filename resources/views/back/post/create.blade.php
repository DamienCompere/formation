@extends('layouts.master')
@section('content')

<h1>Creation d'une formation</h1>

<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="form-group">
        <label for="post_type">Formation :</label>
        <select class="form-control" id="post_type" name="post_type">
            <option value="formation" >Formation </option>
            <option value="stage" >Stage</option>
            <option value="undertermined" >Undertermined</option>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Title:</label>
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
        <label for="start_date">Start Date</label>
        <input type="date" class="form-control" id="start_date" name="start_date" value="{{old('start_date')}}">
    </div>

    <div class="form-group">
        <label for="end_date">End Date</label>
        <input type="date" class="form-control" id="end_date" name="end_date" value="{{old('end_date')}}">
    </div>

    <div class="checkbox">
        <p>Categories</p>
        @forelse($categories as $id => $name)
            <label><input {{ (!empty(old('categories')) && in_array( $id, old('categories')) ) ? 'checked' : '' }} type="checkbox" value="{{$id}}" name="categories[]" id="category{{$id}}">{{$name}}</label>
        @empty
        @endforelse
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{old('price')}}" min="1">
    </div>

    <div class="form-group">
        <label for="nb_max">Max number </label>
        <input type="number" class="form-control" id="nb_max" name="nb_max" value="{{old('nb_max')}}" min="1" step="1">
    </div>

    <p>Status</p>
    <label class="radio-inline"><input type="radio" name="status" value="published" {{old('status') == "published" ? 'checked' : ''}}>Published</label>
    <label class="radio-inline"><input type="radio" name="status" value="unpublished" {{old('status') == "unpublished" ? 'checked' : ''}}>Unpublished</label>

    <br> 

    <p>File</p>
    <input type="file" id="picture" name="picture" accept=""> 
    <br>
  <button type="submit" class="btn btn-default">Submit</button>

</form>


@endsection
