@extends('master')

@section('title', 'Datos de Validación')

@section('content')
    <form method="POST" action="/login">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
    </form>
@endsection