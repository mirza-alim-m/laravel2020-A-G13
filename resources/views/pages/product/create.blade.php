@extends('layouts.app')
@section('content')
<div class="page-title-box d-flex align-items-center justify-content-between">
    <h4 class="mb-0 font-size-18">Create Product</h4>
</div>
<div class="card">
    <div class="card-header">
        <h5>New Product</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" placeholder="Product Name">
                @error('product_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Product Price</label>
                <input type="number" name="product_price" class="form-control @error('product_price') is-invalid @enderror" placeholder="Product Price">
                @error('product_price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="product_category">Kategori Produk</label>
                <select name="product_category" class="form-control @error('product_category') is-invalid @enderror"
                id="product_category">
                    <option value="" selected>- Pilih -</option>
                    @foreach($category as $ct)
                    <option value="{{ $ct->category_name }}">{{ $ct->category_name }}</option>
                    @endforeach
                </select>
                @error('product_category')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Product Image</label>
                <input type="file" name="product_image" class="form-control @error('product_image') is-invalid @enderror">
                @error('product_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Product PDF</label>
                <input type="file" name="product_pdf" class="form-control @error('product_pdf') is-invalid @enderror">
                @error('product_pdf')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection