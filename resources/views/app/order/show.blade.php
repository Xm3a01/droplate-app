@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <!-- general form elements -->
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">Order Products </h3>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($order->orderDetails as $order)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ $order->product->image }}" alt="Card image cap">
                        <div class="card-body">
                          {{-- <h5 class="card-title"> --}}
                              <div class="row justify-content-between text-lg">
                                  <div class="col-md-4">
                                    {{ $order->product->name }}
                                  </div>
                                  <div class="col-md-4">
                                    {{  $order->product->selling_price }}
                                </div>
                              </div>
                          {{-- </h5> --}}
                          <hr>
                            <p class="card-text">
                              {{  $order->product->descripton }}
                            .</p>
                         
                        </div>
                      </div>
                </div>
                    
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection