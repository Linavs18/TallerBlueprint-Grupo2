@extends('templates.base')
@section('title', 'Proyecto')
@section('subtitle', 'Crear')
@section('content')
    @include('templates.messages')

    <div class="row p-2">
        <div class="col-lg-12">
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="row col-lg-12">
                    <label for="title">titulo: </label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>

                <div class="row col-lg-12">
                    <label for="description">Descripción: </label>
                    <input type="text" class="form-control" name="description" id="description">
                </div>

                <div class="row col-lg-12">
                    <label for="owner_id">Propietario: </label>
                    <select name="owner_id" class="form-control" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row col-lg-12">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-success btn-block btn-fill">Guardar</button>
                    </div>

                    <div class="col-lg-6">
                        <a href="{{ route('projects.index') }}" class="btn btn-danger btn-block btn-fill">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection