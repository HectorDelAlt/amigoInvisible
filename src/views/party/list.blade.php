@extends('master')

@section('title', 'Listado de Partidas')

@section('content')
    <a href="/party/create" class="btn btn-primary">Crear Partida</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Admin_ID</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($parties as $party)
                <tr>
                    <td>{{ $party->id }}</td>
                    <td>{{ $party->admin_id }}</td>
                    <td>{{ $party->name }}</td>
                    <td>
                        <a href="/party/{{ $party->id }}/edit" class="col btn btn-secondary">Editar</a>
                        <form action="/party/{{ $party->id }}/destroy" method="POST">
                            <input type="hidden" name="_METHOD" value="DELETE">
                            <input type="submit" value="Delete" class="col btn btn-danger">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center">No Hay Partidas</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
