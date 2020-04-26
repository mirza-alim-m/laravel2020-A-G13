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
        <form action="{{ route('product.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Poduct Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Poduct Price</label>
                <input type="number" name="price" class="form-control" min="1">
            </div>
            <div class="form-group">
                <label for="">Poduct Category</label>
                <select name="category_id" id="">
                    <option value="">Choose Category</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>                        
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection