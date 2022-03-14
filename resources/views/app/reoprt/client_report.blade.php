@extends('layouts.app')

@section('content')
    <div class="container-fluid">
      <div class="container-fluid">
      <div class="card">
          <div class="card-header">

              <form action="" method="get">
              <div class="form-gruop">
                  <div class="row">
                      <div class="col-md-4">
                          <label for="">Form</label>
                          <input type="date" value="{{ $from }}" name="from" id="" class="form-control form-control-sm">
                      </div>
                      <div class="col-md-4">
                          <label for="">To</label>
                          <input type="date" value="{{ $to }}" name="to" id="" class="form-control form-control-sm">
                      </div>
                      <div class="col-md-4">
                       <button class="btn btn-info btn-sm mt-4">
                           <i class="fa fa-filter"></i>
                           Filter
                        </button>
                      </div>
                  </div>
              </div>
              <div class="form-gruop">
              </div>
              </form>
          </div>
      </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Net Profit / Day</h3>
                        <div class="card-tools">
                            <i class="fas fa-circle"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="client-report"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div>
      </div>
    @endsection
    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
        <script>
            $(function() {
                // var areaChartCanvas = $('#areaChart').getContext('2d')
                var clint = document.getElementById('client-report').getContext('2d');
                var clinet = JSON.parse('<?php echo $chart_data  ?>')

                var area = new Chart(clint, {
                    data: {
                        datasets: [{
                            type: 'bar',
                            label: 'Clients',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            data: clinet.data
                        }],
                        labels: clinet.label
                    },
                    // options: options
                });

            })
        </script>
    @endpush
