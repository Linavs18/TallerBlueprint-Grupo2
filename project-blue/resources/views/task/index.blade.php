@extends('templates.base')
@section('title', 'Tareas')
@section('subtitle', 'Listado')
@section('content')
    @include('templates.messages')

    <div class="row col-lg-12">
        <div class="d-flex justify-content-end col-12">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-fill mr-2">Crear</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table id="table_data" class="table table-hover table-striped table-responsive">
                <thead>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Descripcion</td>
                    <td>Estado</td>
                    <td>Fecha vencimiento</td>
                    <td>Projecto</td>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task['id'] }}</td>
                            <td>{{ $task['name'] }}</td>
                            <td>{{ $task['description'] }}</td>
                            <td>{{ $task['status'] }}</td>
                            <td>{{ $task['due_date'] }}</td>
                            <td>{{ $task -> project -> title }}</td>
                            <td>
                                <a href="" class="btn btn-info btn-fill btn-sm mr-2" title="Ver"
                                data-toggle="modal" data-target="#modalShow{{ $task['id'] }}">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-fill btn-sm mr-2" title="Editar">
                                    <i class="nc-icon nc-tap-01"></i>
                                </a>
                                <form id="form-delete-{{ $task['id'] }}" action="{{ route('tasks.destroy', $task['id']) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return remove();" class="btn btn-danger btn-fill btn-sm mr-2" title="Eliminar">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                </form>
                            </td>
                            {{-- Modal --}}
                            <div class="modal fade modal-mini modal-primary" id="modalShow{{ $task['id'] }}"
                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <h5>Detalle</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>ID:</strong>{{ $task['id'] }}</p>
                                            <p><strong>Titulo:</strong>{{ $task['name'] }}</p>
                                            <p><strong>Descripcion:</strong>{{ $task['description'] }}</p>
                                            <p><strong>Estado:</strong>{{ $task['status'] }}</p>
                                            <p><strong>Fecha Vencimiento:</strong>{{ $task['due_date'] }}</p>
                                            <p><strong>Projecto:</strong>{{ $task->project -> title }}</p>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Fin modal --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection