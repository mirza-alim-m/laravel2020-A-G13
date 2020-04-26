@extends('layouts.app')
@section('content')
<div class="page-title-box d-flex align-items-center justify-content-between">
    <h4 class="mb-0 font-size-18">Category Detail</h4>
</div>
<div class="card">
    <div class="card-body">
        <table>
            <tr>
                <td>ID</td>
                <td>:</td>
                <td>{{ $categories->id }}</td>
            </tr>
            <tr>
                <td>Category Name</td>
                <td>:</td>
                <td>{{ $categories->category_name }}</td>
            </tr>
            <tr>
                <td>Product</td>
                <td>:</td>
                <td>
                    @foreach ($categories->products as $cp)
                        <li> {{ $cp->name }}</li>
                    @endforeach
                </td>
            </tr>
        </table>

        <a href="{{route('category.index')}}" class="btn btn-warning float-right"> Back </a>
    </div>
</div>    
@endsection