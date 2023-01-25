@extends('master')

@section('title', 'Modificar Usuario')

@section('content')
    <form method="POST" action="/user/{{$user->id}}">
        <input type="hidden" name="_METHOD" value="PUT">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}">
        </div>
        <button type="submit" class="btn btn-primary">Modify</button>
    </form>
@endsection