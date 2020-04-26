@extends('layouts.app')
@section('content')
<div class="page-title-box d-flex align-items-center justify-content-between">
    <h4 class="mb-0 font-size-18">Product Detail</h4>
</div>
<div class="card">
    <div class="card-body">
        <table>
            <tr>
                <td>ID</td>
                <td>:</td>
                <td>{{ $products->id }}</td>
            </tr>
            <tr>
                <td>Product Name</td>
                <td>:</td>
                <td>{{ $products->name }}</td>
            </tr>
            <tr>
                <td>Product Price</td>
                <td>:</td>
                <td>{{ $products->price }}</td>
            </tr>
            <tr>
                <td>Category</td>
                <td>:</td>
                <td>
                    <li>{{ $products->category->category_name }}</li>
                </td>
            </tr>
        </table>

        <a href="{{route('product.index')}}" class="btn btn-warning float-right"> Back </a>
    </div>
</div>    
@endsection