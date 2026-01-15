@extends('adminlte::page')

@section('title', 'alumno')

@section('content_header')
    <h1>Alumno</h1>
@endsection

@section('content')
    <p>Este es un panel de administración usando AdminLTE.</p>
@endsection

@section('content')

    {{-- Mensajes de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            Hay errores:<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nombre</label>
            <input 
                type="text" 
                name="name" 
                class="form-control" 
                value="{{ old('name') }}" 
                required>
        </div>

        <div class="form-group">
            <label>Módulo</label>
            <input 
                type="text" 
                name="modulo" 
                class="form-control" 
                value="{{ old('modulo') }}" 
                required>
        </div>

        <div class="form-group">
            <label>Calificación</label>
            <input 
                type="int" 
                name="calificacion" 
                class="form-control" 
                required>
        </div>

        <button type="submit" class="btn btn-primary">Dar alta</button>
    </form>
@stop
