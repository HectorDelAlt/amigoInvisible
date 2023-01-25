@extends('master')

@section('title', 'Detalles de ' . $user->name)

@section('content')
    <h2>{{$user->password}}</h2>
    <div class="row">
        <a href="/user/{{ $user->id }}/edit" class="col btn btn-secondary">Editar</a>
        <form action="/user/{{$user->id}}/destroy" method="POST">
            <input type="hidden" name="_METHOD" value="DELETE">
            <input type="submit" value="Delete" class="col btn btn-danger">
        </form>
    </div>
    <a href="/user" class="btn btn-primary">Volver al Listado</a>
@endsection