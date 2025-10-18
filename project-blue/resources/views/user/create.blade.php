
@extends('templates.base')
@section('title', 'Usuario')
@section('subtitle', 'Crear')
@section('content')
    @include('templates.messages')

    <div class="row p-2">
        <div class="col-lg-12">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="row col-lg-12">
                    <label for="name">Nombre: </label>
                    <input type="text" class="form-control" name="name" id="name" required value="{{ old('name') }}">
                </div>

                <div class="row col-lg-12">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" name="email" id="email" required value="{{ old('email') }}">
                </div>

                <div class="row col-lg-12">
                    <label for="password">Contraseña: </label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>

                <div class="row col-lg-12 mt-3">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-success btn-block btn-fill">Guardar</button>
                    </div>

                    <div class="col-lg-6">
                        <a href="{{ route('users.index') }}" class="btn btn-danger btn-block btn-fill">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection