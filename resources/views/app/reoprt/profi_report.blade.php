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
                            <canvas id="day-report"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Net Profit / Months</h3>
                        <div class="card-tools">
                            <i class="fas fa-circle"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="month-report"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Net Profit / Years</h3>
                        <div class="card-tools">
                            <i class="fas fa-circle"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="year-report"
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
                var day = document.getElementById('day-report').getContext('2d');
                var month = document.getElementById('month-report').getContext('2d');
                var year = document.getElementById('year-report').getContext('2d');
                var oDay = JSON.parse('<?php echo $chart_data  ?>')
                var oMoth = JSON.parse('<?php echo $chart_month  ?>')
                var oYear = JSON.parse('<?php echo $chart_year  ?>')

                var area = new Chart(day, {
                    data: {
                        datasets: [{
                            type: 'line',
                            label: 'Net profit per day',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            data: oDay.data
                        }],
                        labels: oDay.label
                    },
                    // options: options
                });

                var areaCh = new Chart(month, {
                    data: {
                        datasets: [{
                            type: 'bar',
                            label: 'Net profit per month',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            data: oMoth.data
                        }],
                        labels: oMoth.label
                    },
                    // options: options
                });


                var areaChar = new Chart(year, {
                    data: {
                        datasets: [{
                            type: 'bar',
                            label: 'Net profit per Year',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            data: oYear.data
                        }],
                        labels: oYear.label
                    },
                    // options: options
                });
            })
        </script>
    @endpush
