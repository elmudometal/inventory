@extends('layouts.app')
@section('htmlheader_title')
    Listado de Obras
@endsection

@section('main-content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ count($depots) }}</h3>

                        <p>Agregar Obra<br><br><br></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="/depotAdd" class="small-box-footer">Ir a Agregar Obra <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            @foreach($depots as $depot)
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>#{{ $depot->nproject }}</h3>
                            <p>{{ $depot->name }} <br>{{ $depot->adress }}<br>{{ $depot->supervisor }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="/depotProduct/{{ $depot->id }}" class="small-box-footer">Ir a {{ $depot->name }}
                            <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
        @endforeach
        <!-- ./col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- Main row -->
@endsection
