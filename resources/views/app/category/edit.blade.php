@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-11">
            <!-- general form elements -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Update Category</h3>
                </div>
                <div class="card-body conatiner-fluid">

                    <form method="post" action="{{ route('categories.update' , $category->id) }}" id="app" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Arabic name</label>
                                    <input type="text" name="ar_name" id=""  value="{{ $category->ar }}"
                                      class="form-control form-control-sm" placeholder="Arabic name">
                                </div>
                                <div class="col-md-6">
                                    <label for="">English name</label>
                                    <input type="text" name="name" id="" value="{{ $category->en }}"
                                      class="form-control form-control-sm" placeholder="English name">
    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection
@push('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
