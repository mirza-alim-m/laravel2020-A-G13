@extends('layouts.app')
@section('content')
<div class="page-title-box d-flex align-items-center justify-content-between">
    <h4 class="mb-0 font-size-18">Category Detail</h4>
</div>
<div class="card">
    <div class="card-body">
        <h6 class="row">
                <div class="col-sm-2">Category Name</div>
                <div class="col-sm-1">:</div>
                <div class="col-sm-2">{{ $category->category_name }}</div>
            </h6>
            <h6 class="row">
                <div class="col-sm-2">Category Image</div>
                <div class="col-sm-1">:</div>
                <div class="col-sm-2">
                    @if($category->category_image != NULL)
                        <img src="{{asset('/storage/image/'.$category->category_image)}}" class="w-150">
                    @else
                        <span>-</span>
                    @endif
                </div>
            </h6>
            <h6 class="row">
                <div class="col-sm-2">Category PDF</div>
                <div class="col-sm-1">:</div>
                <div class="col-sm-2">
                    @if($category->category_pdf != NULL)
                        <a href="{{asset('storage/pdf/'.$category->category_pdf)}}" target="_blank">Download PDF</a>
                    @else
                        <span>-</span>
                    @endif
                </div>
            </h6>
            <h6 class="row">
                <div class="col-sm-2">Dibuat Pada</div>
                <div class="col-sm-1">:</div>
                <div class="col-sm-2">{{$category->created_at}}</div>
            </h6>
        <a href="{{route('category.index')}}" class="btn btn-warning float-right">Back</a>
    </div>
</div>    
@endsection