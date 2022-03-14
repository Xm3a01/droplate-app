@extends('layouts.app')

@section('content')
    <div class="container-fluid">
      <div class="container-fluid">
      <div class="card">
          <div class="card-header">

              <form action="" method="get">
              <div class="form-gruop">
                  <div class="row">
                      <div class="col-md-3">
                          <label for="">Form</label>
                          <input type="date" value="{{ $from }}" name="from" id="" class="form-control form-control-sm">
                      </div>
                      <div class="col-md-3">
                          <label for="">To</label>
                          <input type="date" value="{{ $to }}" name="to" id="" class="form-control form-control-sm">
                      </div>
                      <div class="col-md-3">
                        <label for="">City</label>
                        <select  name="city_id" id="" class="form-control form-control-sm">
                            @foreach ($cities as $city)     
                             <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Region</label>
                        <select  name="region_id" id="" class="form-control form-control-sm">
                            @foreach ($regions as $region)     
                             <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
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
                        <h3 class="card-title">Delivery price</h3>
                        <div class="card-tools">
                            {{-- <i class="fas fa-circle"></i> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="dlivry-report"
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
                var dlivry = document.getElementById('dlivry-report').getContext('2d');
                var delivery = JSON.parse('<?php echo $chart_data  ?>')

                var area = new Chart(dlivry, {
                    data: {
                        datasets: [{
                            type: 'bar',
                            label: 'Fast delivery',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            data: delivery.fast
                        },{
                            type: 'line',
                            label: 'Normal Delivery',
                            backgroundColor: '#007bff91',
                            borderColor: '#007bff',
                            data: delivery.normal
                        }],
                        labels: delivery.label
                    },
                    // options: options
                });

            })
        </script>
    @endpush
