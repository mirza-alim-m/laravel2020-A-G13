@extends('layouts.app')
@section('content')
<div class="page-title-box d-flex align-items-center justify-content-between">
    <h4 class="mb-0 font-size-18">Category</h4>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="category_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('category.index') }}" method="get">
                    <table class="float-right">
                        <tr>
                            <td><input type="text" name="search" class="form-control form-control-sm"></td>
                            <td><button type="submit" class="btn btn-primary btn-sm">Cari</button></td>
                        </tr>
                    </table>
                </form><br>
                <hr>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Category Name</td>
                            <td>Option</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @forelse ($categories as $category)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $category->category_name}}</td>
                            <td>
                                <form action="{{route('category.destroy', $category->id)}}" method="POST" id="data-{{$category->id}}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                                <a href="{{route('category.show', $category->id)}}"
                                    class="btn btn-light btn-sm">SHOW</a>
                                <a href="{{route('category.edit', $category->id)}}"
                                    class="btn btn-warning btn-sm">EDIT</a>
                                <button onclick="deleteRow({{$category->id}})" class="btn btn-danger btn-sm">DELETE</button>

                            </td>
                        </tr>
                        @empty
                        <tr class="text-center">
                            <td colspan="3">No Available Data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
<script>
    function deleteRow(id) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $('#data-'+id).submit();
            }
        });
    }
</script>
@endsection
