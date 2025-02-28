@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        <h1>Listado de Clientes</h1>
        <a href="{{ route('client.create') }}" class="btn btn-primary">Crear Cliente</a>

        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{Session::get('mensaje')}}
            </div>
        @endif

        <div
            class="table"
        >
            <table
                class="table table-white"
            >
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Saldo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clients as $client)
                    <tr class="">
                        <td scope="row">{{ $client->name }}</td>
                        <td>${{ $client->due }}</td>
                        <td>
                            <a href="{{ route('client.edit', $client->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('client.destroy', $client->id) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Eliminar registro?')">Borrar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr class="">
                        <td scope="row" colspan="3">No hay registro.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            @if ($clients->count())
            {{ $clients->links() }}
            @endif
        </div>
    </div>