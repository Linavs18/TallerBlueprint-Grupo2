@extends('templates.base')
@section('title', 'useros')
@section('subtitle', 'Listado')
@section('content')
    @include('templates.messages')

    <div class="row col-lg-12">
        <div class="d-flex justify-content-end col-12">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-fill mr-2">Crear</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table id="table_data" class="table table-hover table-striped table-responsive">
                <thead>
                    <td>Id</td>
                    <td>nombre</td>
                    <td>email</td>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user['id'] }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>
                                <a href="" class="btn btn-info btn-fill btn-sm mr-2" title="Ver"
                                data-toggle="modal" data-target="#modalShow{{ $user['id'] }}">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-fill btn-sm mr-2" title="Editar">
                                    <i class="nc-icon nc-tap-01"></i>
                                </a>
                                <form id="form-delete-{{ $user['id'] }}" action="{{ route('users.destroy', $user['id']) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return remove();" class="btn btn-danger btn-fill btn-sm mr-2" title="Eliminar">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                </form>
                            </td>
                            {{-- Modal --}}
                            <div class="modal fade modal-mini modal-primary" id="modalShow{{ $user['id'] }}"
                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <h5>Detalle</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>ID:</strong>{{ $user['id'] }}</p>
                                            <p><strong>Nombre:</strong>{{ $user['name'] }}</p>
                                            <p><strong>Correo:</strong>{{ $user['email'] }}</p>
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