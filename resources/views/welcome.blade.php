@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        <h1 class="text-center">Hola mundo</h1>
        <a href="{{ route('client.index') }}" class="btn btn-primary">Clientes</a>
    </div>
