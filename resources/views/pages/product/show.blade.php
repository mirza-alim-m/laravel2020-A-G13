@extends('layouts.app')
@section('content')
<div class="page-title-box d-flex align-items-center justify-content-between">
    <h4 class="mb-0 font-size-18">Product Detail</h4>
</div>
<div class="card">
    <div class="card-body">
        <h6 class="row">
            <div class="col-sm-2">Product Name</div>
            <div class="col-sm-1">:</div>
            <div class="col-sm-2">{{ $product->product_name }}</div>
        </h6>
        <h6 class="row">
            <div class="col-sm-2">Product Price</div>
            <div class="col-sm-1">:</div>
            <div class="col-sm-2">{{ $product->product_price }}</div>
        </h6>
        <h6 class="row">
            <div class="col-sm-2">Product Category</div>
            <div class="col-sm-1">:</div>
            <div class="col-sm-2">{{ $product->product_category }}</div>
        </h6>
        <h6 class="row">
            <div class="col-sm-2">Product Image</div>
            <div class="col-sm-1">:</div>
            <div class="col-sm-2">
                @if($product->product_image != NULL)
                    <img src="{{asset('/storage/image/'.$product->product_image)}}" class="w-150">
                @else
                    <span>-</span>
                @endif
            </div>
        </h6>
        <h6 class="row">
            <div class="col-sm-2">Product PDF</div>
            <div class="col-sm-1">:</div>
            <div class="col-sm-2">
                @if($product->product_pdf != NULL)
                    <a href="{{asset('storage/pdf/'.$product->product_pdf)}}" target="_blank">Download PDF</a>
                @else
                    <span>-</span>
                @endif
            </div>
        </h6>
        <h6 class="row">
            <div class="col-sm-2">Dibuat Pada</div>
            <div class="col-sm-1">:</div>
            <div class="col-sm-2">{{$product->created_at}}</div>
        </h6>
        <a href="{{route('product.index')}}" class="btn btn-warning float-right"> Back </a>
    </div>
</div>    
@endsection