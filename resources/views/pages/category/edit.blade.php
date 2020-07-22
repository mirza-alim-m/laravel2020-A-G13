@extends('layouts.app')
@section('content')
<div class="page-title-box d-flex align-items-center justify-content-between">
    <h4 class="mb-0 font-size-18">Category</h4>
</div>

<div class="card">
    <div class="card-body">
        <form action="/category/{{ $category->id }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="">Category Name</label>
                <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" value="{{ $category->category_name }}">
                @error('category_name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_image">Category Image</label>
                @if($category->category_image != NULL)
                <div>
                    <input type="hidden" name="oldimage" value="{{ $category->category_image }}">
                    <img src="{{asset('storage/image/'.$category->category_image)}}" class="mb-2">
                </div>
                @endif
                <input type="file" name="category_image" class="form-control @error('category_image') is-invalid @enderror" id="category_image" />
                @error('category_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_pdf">Category PDF</label>
                @if($category->category_pdf != NULL)
                <div>
                    <input type="hidden" name="oldpdf" value="{{ $category->category_pdf }}">
                    <a href="{{asset('/storage/pdf/'.$category->category_pdf)}}" target="_blank">Lihat PDF Sebelumnya</a>
                </div>
                @endif
                <br>
                <input type="file" name="category_pdf" class="form-control @error('category_pdf') is-invalid @enderror" id="category_pdf" />
                @error('category_pdf')
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
