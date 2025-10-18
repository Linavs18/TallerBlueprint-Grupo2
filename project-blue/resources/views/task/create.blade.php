@extends('templates.base')
@section('title', 'Tarea')
@section('subtitle', 'Crear')
@section('content')
    @include('templates.messages')

    <div class="row p-2">
        <div class="col-lg-12">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="row col-lg-12">
                    <label for="name">Nombre: </label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>

                <div class="row col-lg-12">
                    <label for="description">Descripción: </label>
                    <textarea class="form-control" name="description" id="description"></textarea>
                </div>

                <div class="row col-lg-12">
                    <label for="status">Estado: </label>
                    <select name="status" class="form-control" required>
                        <option value="pendiente" selected>Pendiente</option>
                        <option value="en progreso">En progreso</option>
                        <option value="completada">Completada</option>
                    </select>
                </div>

                <div class="row col-lg-12">
                    <label for="due_date">Fecha de vencimiento: </label>
                    <input type="date" class="form-control" name="due_date" id="due_date">
                </div>

                <div class="row col-lg-12">
                    <label for="project_id">Proyecto: </label>
                    <select name="project_id" class="form-control" required>
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row col-lg-12 mt-3">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-success btn-block btn-fill">Guardar</button>
                    </div>

                    <div class="col-lg-6">
                        <a href="{{ route('task.index') }}" class="btn btn-danger btn-block btn-fill">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection