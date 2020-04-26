@extends('layouts.app')
@section('content')
<div class="page-title-box d-flex align-items-center justify-content-between">
    <h4 class="mb-0 font-size-18">Category</h4>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('category.update', $categories->id) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="">Category Name</label>
            <input type="text" name="category_name" class="form-control" value="{{ $categories->category_name }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
    </div>
</div>
@endsection
