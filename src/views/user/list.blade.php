@extends('master')

@section('title', 'Listado de Usuario')

@section('content')
    <a href="/user/create" class="btn btn-primary">Crear Usuario</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Password</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->password }}</td>
                    <td>
                        <a href="/user/{{ $user->id }}" class="col btn btn-primary">Mostrar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center">No Hay Usuarios</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
