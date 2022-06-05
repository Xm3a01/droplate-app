{{-- @extends('layouts.app') --}}



{{-- @section('content') --}}
    {{-- <x-data-table></x-data-table> --}}
    <div id="app">
        <example-component></example-component>
    </div>
{{-- @endsection --}}
{{-- @push('js') --}}
   <script src="{{ asset('js/app.js') }}"></script>
    {{-- <x-js></x-js> --}}
{{-- @endpush --}}