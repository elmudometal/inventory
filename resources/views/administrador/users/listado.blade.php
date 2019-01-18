@extends('layouts.app')
@section('contentheader_title', $titulo)
@section('main-content')
    <div class="col-md-12">
        <a class="btn btn-success pull-right" href="{{ asset('admin/users/nuevo/') }}" role="button"><i
                    class="fa fa-fw fa-newspaper-o"></i> Nuevo</a>
    </div>
    <br><br>
    <table id="tabla_cursos" class="table table-striped table-bordered" cellspacing="5">
        <thead>
        <tr>
            <th>id</th>
            <th>Nombres</th>
            <th>Email</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>id</th>
            <th>Nombres</th>
            <th>Email</th>
            <th>Opciones</th>
        </tr>
        </tfoot>
        <tbody>
        @forelse($users as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email}}</td>
                <td>
                    <a href="{{ url('admin/users/'.$item->id.'/edit') }}" title=" Editar" class="btn btn-warning">
                        <i class="fa fa-fw fa-edit"></i> <span class="text-muted"></span> Editar
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        @endforelse

        </tbody>
    </table>

@endsection
@push('scripts_js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#tabla_cursos').DataTable();
    });
</script>
@endpush