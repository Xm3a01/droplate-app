@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Show Product</h3>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Ar name</th>
                </tr>
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->getTranslation('name' , 'ar') }}</td>
                </tr>
                <tr>
                    <th>Selling price</th>
                    <th>َQuantity</th>
                </tr>
                <tr>
                    <td>{{ $product->selling_price }}</td>
                    <td>{{ $product->quantity }}</td>
                </tr>
                <tr>
                    <th>Descripton</th>
                    <th>Ar descripton</th>
                </tr>
                <tr>
                    <td>{{ $product->descripton }}</td>
                    <td>{{ $product->getTranslation('descripton' , 'ar') }}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <th>Ar category</th>
                </tr>
                <tr>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->category->getTranslation('name' , 'ar') }}</td>
                </tr>
                <tr>
                    <th>Sub category</th>
                    <th>Ar Sub category</th>
                </tr>
                <tr>
                    <td>{{ $product->subCategory->name }}</td>
                    <td>{{ $product->subCategory->getTranslation('name' , 'ar') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection