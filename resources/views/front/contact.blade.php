@extends('layouts.master')
@section('content')

<div class="container">
    <h1>Contact</h1>
    <form method="post" action="{{ route('contact.mailer') }}">
    {{csrf_field()}}
        <div class="form-group">
            <label>Email Adress</label>
            <input type="text" class="form-control" name="email">
            @if($errors->has('email'))
                <span class="error">{{$errors->first('email')}}</span>
            @endif
        </div>
        <div class="form-group">
            <label>Message</label>
            <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
            @if($errors->has('message'))
                <span class="error">{{$errors->first('message')}}</span>
            @endif
        </div>

        <button class="btn btn-info">Envoyer</button>

    </form>
</div>


@endsection

