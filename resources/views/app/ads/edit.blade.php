@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-11">
            <!-- general form elements -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Reciving Form</h3>
                </div>

                <form method="post" action="{{ route('ads.update') }}" id="app" enctype="multipart/form-data">
                    @csrf
                    <weight-input></weight-input>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@push('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
