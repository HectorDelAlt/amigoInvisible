@extends('master')

@section('title', 'Bienvenid@ a Ifriend')

@section('content')
    <h2>Tu Gestor del Amigo Invisible</h2>
    @isset($_SESSION['id'])
    <a href="/user" class="btn btn-primary">Listado de Usuarios</a>
    @endisset
@endsection