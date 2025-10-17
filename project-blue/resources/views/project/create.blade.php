@extends('templates.base')
@section('title', 'Categorías')
@section('subtitle', 'Crear')
@section('content')
    @include('templates.messages')

    <div class="row p-2">
        <div class="col-lg-12">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="row col-lg-12">
                    <label for="name">id: </label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>

                <div class="row col-lg-12">
                    <label for="description">Descripción: </label>
                    <input type="text" class="form-control" name="description" id="description">
                </div>

                <div class="row col-lg-12">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-success btn-block btn-fill">Guardar</button>
                    </div>

                    <div class="col-lg-6">
                        <a href="{{ route('categories.index') }}" class="btn btn-danger btn-block btn-fill">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection