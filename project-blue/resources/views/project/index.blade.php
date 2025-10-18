@extends('templates.base')
@section('title', 'Projectos')
@section('subtitle', 'Listado')
@section('content')
    @include('templates.messages')

    <div class="row col-lg-12">
        <div class="d-flex justify-content-end col-12">
            <a href="{{ route('projects.create') }}" class="btn btn-primary btn-fill mr-2">Crear</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table id="table_data" class="table table-hover table-striped table-responsive">
                <thead>
                    <td>Id</td>
                    <td>Titulo</td>
                    <td>Descripcion</td>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project['id'] }}</td>
                            <td>{{ $project['title'] }}</td>
                            <td>{{ $project['description'] }}</td>
                            <td>
                                <a href="" class="btn btn-info btn-fill btn-sm mr-2" title="Ver"
                                data-toggle="modal" data-target="#modalShow{{ $project['id'] }}">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </a>
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-fill btn-sm mr-2" title="Editar">
                                    <i class="nc-icon nc-tap-01"></i>
                                </a>
                                <form id="form-delete-{{ $project['id'] }}" action="{{ route('projects.destroy', $project['id']) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-fill btn-sm mr-2" title="Eliminar">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                </form>
                            </td>
                            {{-- Modal --}}
                            <div class="modal fade modal-mini modal-primary" id="modalShow{{ $project['id'] }}"
                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <h5>Detalle</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>ID:</strong>{{ $project['id'] }}</p>
                                            <p><strong>Titulo:</strong>{{ $project['title'] }}</p>
                                            <p><strong>Descripcion:</strong>{{ $project['description'] }}</p>
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

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('form[id^="form-delete-"]').forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Alerts.confirmDelete(form);
                });
            });
        });
    </script>
@endsection