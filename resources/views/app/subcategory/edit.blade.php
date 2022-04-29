@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Sub Category Edit</h3>
                </div>

                <form action="{{ route('sub_categories.update' , $sub->id) }}" id="create-form" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <div class="row p-2">
                            <div class="col-md-6">
                                <label for="">Arabic name</label>
                                <input type="text" placeholder="Arabic name" name="ar_name" id=""
                                value="{{ $sub->getTranslation('name' , 'ar') }}"
                                    class="form-control form-control-sm" autocomplete="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">English name</label>
                                <input type="text" placeholder="English name" name="name" id=""
                                   value="{{ $sub->getTranslation('name' , 'en') }}"
                                    class="form-control form-control-sm" autocomplete="" required>
                            </div>
                            
                            <div class="col-md-6">
                              <label for="">Categories</label>
                             <select name="category_id" id="" class="form-control from-control-sm">
                               <option value="">Categories</option>
                               @foreach ($categories as $category)
                                   <option {{ $sub->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                               @endforeach
                             </select>
                          </div>
                          <div class="col-md-6">
                              <label for="">Image</label>
                              <input type="file" placeholder="" name="image" id=""
                                  class="form-control form-control-sm" autocomplete="">
                          </div>
                        </div>
                        
                </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
            </div>
        </div>

    </div>
@endsection
@push('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
