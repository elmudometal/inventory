@extends('layouts.app')
@section('htmlheader_title')
    Agregar Maestro
@endsection

@section('main-content')
    <div class="box">
        <div class="box-header">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <h3 class="box-title">Herramientas de {{ isset($type) ? $type:'Maestro' }}</h3>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="listPersonals" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Herramienta</th>
                    <th>Valor</th>
                    <td>Descripcion</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($tools as $tool)
                    <tr>
                        <td>{{ $tool->id }}</td>
                        <td>{{ $tool->descriptions }}</td>
                        <td>{{ $tool->price }}</td>
                        <td>
                            <a href="{{ url('workerEdit/'.'') }}" title=" Editar"
                               class="btn btn-warning">
                                <i class="fa fa-fw fa-edit"></i> <span class="text-muted"></span> Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Herramienta</th>
                    <th>Valor</th>
                    <td>Descripcion</td>
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
