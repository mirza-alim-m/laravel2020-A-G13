@extends('layouts.app')
@section('content')
<div class="page-title-box d-flex align-items-center justify-content-between">
    <h4 class="mb-0 font-size-18">Product</h4>
</div>
<div class="card">
    <div class="card-body">
        <div class="float-right">
            <form action="{{ route('product.index') }}" method="get">
                @csrf
                <table>
                    <tr>
                        <td><input type="text" name="search" class="form-control"></td>
                        <td><button type="submit" class="btn btn-primary">Search</button></td>
                    </tr>
                </table>
            </form>
        </div>
        <a href="{{route('product.create')}}" class="btn btn-primary">Add New Product</a>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>@sortablelink('name', 'Product Name')</td>
                        <td>Option</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                <form action="{{ route('product.destroy', $product->id) }}" method="post" id="data-{{$product->id}}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-light">Show</a>
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                <button onclick="deleteRow({{$product->id}})" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No available data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{$products->links()}}
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