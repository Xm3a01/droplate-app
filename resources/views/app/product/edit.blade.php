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
                    <div class="form-body p-4" id="app">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <select name="" id="" class="form-control form-control-sm">
                                    <option value="">Categories</option>
                                    @foreach ($categories as $category)
                                      <option value="$category->id">{{ $category->name }}</option>                                       
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="" id="" class="form-control form-control-sm">
                                    <option value="">Sub Categories</option>
                                    @foreach ($subCategories as $subCategory)
                                    <option value="$subCategory->id"> {{ $subCategory->name }}</option>                                       
                                  @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                  
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-6">
                            <label>Product AR name</label>
                            <input
                              name="ar_name"
                              class="form-control form-control-sm thingSelect"
                              style="width: 100%"
                              placeholder="Arabic name"
                              required
                              value="{{ $product->getTranslation('name' , 'ar') }}"
                            />
                          </div>
                          <div class="col-md-6">
                            <label>Product EN name</label>
                            <input
                              name="en_name"
                              class="form-control form-control-sm"
                              style="width: 100%"
                              placeholder="English name"
                              required
                              value="{{ $product->getTranslation('name' , 'en') }}"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="exampleInputEmail1">Quantity</label>
                            <input
                              type="text"
                              name="quantity"
                              class="form-control form-control-sm"
                              id="exampleInputEmail1"
                              placeholder="Enter Quantity"
                              required
                              value="{{ $product->quantity }}"
                            />
                          </div>
                          <div class="col-md-6">
                            <label for="exampleInputEmail1">Discount</label>
                            <input
                              type="text"
                              name="discount"
                              class="form-control form-control-sm"
                              id=""
                              placeholder="Enter Discount"
                              value="{{ $product->discount }}"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4">
                            <label for="exampleInputEmail1">Selling price</label>
                            <input
                              type="text"
                              name="selling_price"
                              class="form-control form-control-sm"
                              id=""
                              placeholder="Enter Selling price"
                              required
                              value="{{ $product->selling_price }}"
                            />
                          </div>
                          <!-- purchasing_price -->
                          <div class="col-md-4">
                            <label for="exampleInputEmail1">Wholesale price</label>
                            <input
                              type="text"
                              name="wholesale_price"
                              class="form-control form-control-sm"
                              id="exampleInputEmail1"
                              placeholder="Enter Wholesale price"
                              required
                              value="{{ $product->wholesale_price }}"
                            />
                          </div>
                          <div class="col-md-4">
                            <label for="exampleInputEmail1">Purchasing price</label>
                            <input
                              type="text"
                              name="purchasing_price"
                              class="form-control form-control-sm"
                              id="exampleInputEmail1"
                              placeholder="Enter Purchasing price"
                              required
                              value="{{ $product->purchasing_price }}"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="exampleInputEmail1">English Description</label>
                            <textarea
                              type="text"
                              name="en_description"
                              class="form-control form-control-sm"
                              id="exampleInputEmail1"
                              placeholder="Enter Description"
                              required
                            >
                            {{ $product->getTranslation('descripton' , 'en') }}
                            </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="exampleInputEmail1">Arabic Description </label>
                            <textarea
                              type="text"
                              name="ar_description"
                              class="form-control form-control-sm"
                              id="exampleInputEmail1"
                              placeholder="Enter Description"
                              required
                            >
                            {{ $product->getTranslation('descripton' , 'ar') }}
                            </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <input-image />
                          </div>    
  
                        </div>
                      </div>
                    </div>
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
