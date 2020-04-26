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
        <form action="{{ route('product.update', $products->id) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="">Poduct Name</label>
                <input type="text" name="name" class="form-control" value="{{$products->name}}">
            </div>
            <div class="form-group">
                <label for="">Poduct Price</label>
                <input type="number" name="price" class="form-control" min="1" value="{{$products->price}}">
            </div>
            <div class="form-group">
                <label for="">Poduct Category</label>
                <select name="category_id" id="">
                        <option value="{{$products->category_id}}">{{$products->category->category_name}}</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection