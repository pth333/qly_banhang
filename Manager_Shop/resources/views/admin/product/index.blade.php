@extends('layouts.admin')

@section('title','Product List')

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'Product','key' => 'List'])

    <!-- Main content -->
    <div class="card">
        <div class="card-header">
            <div class="row">

                <div class="col col-md-12">
                    <a href="{{ route('products.create')}}" class="btn btn-success btn-sm float-right">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Hình ảnh</th>
                    <th>Danh mục</th>
                    <th>Action</th>

                </tr>
                @if(count($products) > 0)

                @foreach($products as $product)

                <tr>
                
                    <td>{{ $product->id}}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price) }}</td>
                    <td>
                        <img class="products_image" src="{{ $product->feature_image_path }}" alt="">
                    </td>
                    <td>{{ optional($product->category)->name  }}</td>
                    <td>
                        <form method="post">
                            @csrf
                            @method('DELETE')
                            <a href="" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="" 
                            data-url="{{ route('products.destroy', ['id' => $product->id]) }}" 
                            class="btn btn-danger btn-sm action_delete">Delete</a>
                    
                        </form>

                    </td>
                </tr>

                @endforeach

                @else
                <tr>
                    <td colspan="5" class="text-center">No Data Found</td>
                </tr>
                @endif
            </table>

        </div>
        <div class="d-flex justify-content-center">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    </div>
  
</div>

@endsection
@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert.min.js') }}"></script>
<script src="{{ asset('admins/main.js') }}"></script>
@endsection