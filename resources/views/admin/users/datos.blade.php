@extends('adminlte::page')

@section('title', 'alumnos')

@section('content_header')
    <h1>Lista de alumnos</h1>
@stop

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>modulo</th>
            <th>Calificacion</th>
            <th>Fecha creación</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->id }}</td>
                <td>{{ $alumno->nombre }}</td>
                <td>{{ $alumno->modulo }}</td>
                <td>{{ $alumno->email }}</td>
                <td>{{ $alumno->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop
