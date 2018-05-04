@extends('layouts.app')
@section('htmlheader_title')
    Agregar Maestro
@endsection

@section('main-content')
    <div class="box">
        <div class="box-header">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <h3 class="box-title">Listado de {{ isset($type) ? $type:'Maestro' }}</h3>
                <a href="{{ url('/worker/'.$role) }}" class="btn btn-primary">Agregar</a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="listPersonals" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>RUT</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <td>Acciones</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($personals as $personal)
                    <tr>
                        <td>{{ $personal->id }}</td>
                        <td>{{ $personal->rut }}</td>
                        <td>{{ $personal->fullname }}</td>
                        <td>{{ $personal->email }}</td>
                        <td>
                            <a href="{{ url('/workerEdit/'.$personal->id.'') }}" title=" Editar"
                               class="btn btn-warning">
                                <i class="fa fa-fw fa-edit"></i> <span class="text-muted"></span> Editar
                            </a>
                            <a href="{{ url('/box/'.$personal->id.'') }}" title=" Editar"
                               class="btn btn-warning">
                                <i class="fa fa-fw fa-edit"></i> <span class="text-muted"></span> Ver Caja
                            </a>
                            <!--<a href="{{ url('workerEdit/'.$personal->id.'') }}" title=" Editar"
                               class="btn btn-warning">
                                <i class="fa fa-fw fa-edit"></i> <span class="text-muted"></span> Cerrar Caja
                            </a>-->
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>RUT</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <td>Acciones</td>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection
@section('footer_scripts')
    <script src="{{ url('/js/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/js/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#listPersonals').DataTable()

        })
    </script>
@endsection
