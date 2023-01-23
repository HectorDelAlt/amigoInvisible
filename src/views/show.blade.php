@extends('master')

@section('title', 'Detalles de ' . $user->name)

@section('content')
    <h2>{{$user->password}}</h2>
    <a href="/user" class="btn btn-primary">Volver al Listado</a>
@endsection