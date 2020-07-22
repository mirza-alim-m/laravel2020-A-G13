@extends('layouts.app')
@section('content')
<div class="page-title-box d-flex align-items-center justify-content-between">
    <h4 class="mb-0 font-size-18">Edit Product</h4>
</div>
<div class="card">
    <div class="card-header">
        <h5>Edit Product</h5>
    </div>
    <div class="card-body">
        <form action="/product/{{ $product->id }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ $product->product_name }}">
                @error('product_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Product Price</label>
                <input type="number" name="product_price" class="form-control @error('product_price') is-invalid @enderror" value="{{ $product->product_price }}">
                @error('product_price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="product_category">Product Category</label>
                <select name="product_category" class="form-control" id="product_category">
                    <option value="">- Pilih -</option>
                    @foreach($category as $ct)
                    <option value="{{ $ct->category_name }}" {{ $product->product_category == $ct->category_name ? 'selected' : ''}}>
                    {{ $ct->category_name }}</option>
                    @endforeach
                </select>
                @error('product_category')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="product_image">Product Image</label>
                @if($product->product_image != NULL)
                <div>
                    <input type="hidden" name="oldimage" value="{{ $product->product_image }}">
                    <img src="{{asset('storage/image/'.$product->product_image)}}" class="mb-2">
                </div>
                @endif
                <input type="file" name="product_image" class="form-control @error('product_image') is-invalid @enderror" id="product_image" />
                @error('product_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="product_pdf">Product PDF</label>
                @if($product->product_pdf != NULL)
                <div>
                    <input type="hidden" name="oldpdf" value="{{ $product->product_pdf }}">
                    <a href="{{asset('/storage/pdf/'.$product->product_pdf)}}" target="_blank">Lihat PDF Sebelumnya</a>
                </div>
                @endif
                <br>
                <input type="file" name="product_pdf" class="form-control @error('product_pdf') is-invalid @enderror" id="product_pdf" />
                @error('product_pdf')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection