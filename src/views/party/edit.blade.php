@extends('master')

@section('title', 'Modificar Partida')

@section('content')
    <form method="POST" action="/party/{{$party->id}}">
        <input type="hidden" name="_METHOD" value="PUT">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$party->name}}">
        </div>
        <button type="submit" class="btn btn-primary">Modify</button>
    </form>
@endsection