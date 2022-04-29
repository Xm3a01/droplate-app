@extends('layouts.app')

@section('content')
    <div class="container-fluid">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="fas fa-th"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Products</span>
                        <span class="info-box-number">{{ $products }}</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: {{ ($products/60000) *100 }}"></div>
                        </div>
                        <span class="progress-description">
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="fas fa-columns"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Brands</span>
                        <span class="info-box-number">{{ $brands }}</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: {{ ($brands/60000) *100 }}"></div>
                        </div>
                        <span class="progress-description">
                        </span>
                    </div>

                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-danger">
                    <span class="info-box-icon"><i class="fa fa-copy"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Orders</span>
                        <span class="info-box-number">{{ $orders }}</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: {{ ($orders/60000) *100 }}"></div>
                        </div>
                        <span class="progress-description">
                        </span>
                    </div>

                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Area Chart</h3>
                        <div class="card-tools">
                            <i class="fas fa-circle"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="areaChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}
        
      </div>
    @endsection
    @push('js')
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
        <script>
            $(function() {
                // var areaChartCanvas = $('#areaChart').getContext('2d')
                var ctx = document.getElementById('areaChart').getContext('2d');

                var areaChartData = new Chart(ctx, {
                    data: {
                        datasets: [{
                            type: 'bar',
                            label: 'Bar Dataset',
                            data: [120, 200, 300, 40]
                        }, {
                            type: 'line',
                            label: 'Line Dataset',
                            data: [500,350, 50, 10],
                        }],
                        labels: ['January', 'February', 'March', 'April']
                    },
                    // options: options
                });
            })
        </script> --}}
    @endpush
