@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Reciving Form</h3>
                </div>

                <form method="post" action="{{ route('products.update' , $product->id) }}" id="app" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <product-form 
                        categories = "{{$categories}}" 
                        sub_categories = "{{$sub_categories}}" 
                        product = {{ $product }}
                        errors = "{{count($errors->all()) > 0 ? json_encode($errors->all()) : null}}"
                      ></product-form>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Save Change</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@push('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
