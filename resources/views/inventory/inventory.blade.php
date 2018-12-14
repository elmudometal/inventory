@extends('layouts.app')
@section('htmlheader_title')
    Inventario
@endsection
@section('main-content')
    <div class="box">
        <div class="box-header">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <h3 class="box-title">General</h3>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#tab_1-1" data-toggle="tab">General</a></li>
                    <li class="pull-left header"><i class="fa fa-th"></i> Obra: </li>
                </ul>
                <div class="tab-content">

                    <canvas id="myChart" width="400" height="400"></canvas>


                    <div class="tab-pane active" id="tab_1-1">
                        <table id="listProduct1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Ítem</th>
                                <th>Stock</th>
                                <th>Salidas</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $totalPrice = $totalStock = $totalEntry = 0; @endphp
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->identifier }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->stock($product->depot_id) }}</td>
                                    <td>{{ $product->egresses($product->depot_id) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>


        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection
@section('footer_scripts')
    <script src="{{ url('/js/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/js/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var labels = new Array();
        var data = new Array();
        @php
            foreach($depots as $depot){
            echo 'labels["'.$depot->id.'"] = "'. $depot->name.'";';
            echo 'data["'.$depot->id.'"] = "'. $depot->egresses().'";';
            }
        @endphp
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: '$ Utilizados ',
                    data: data,
                /*    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],*/
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        $(function () {
            $('.table').DataTable();
        })
    </script>
@endsection
