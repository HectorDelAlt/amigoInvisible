@extends('master')

@section('title', 'Crear Partida')

@section('content')
    <form method="POST" action="/party">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <h3>Participantes:</h3>
            @foreach ($users as $user)
                <input type="checkbox" name="participants[]" id="user{{ $user->id }}" value="{{ $user->id }}">
                <label for="user{{ $user->id }}">{{ $user->name }}</label>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
