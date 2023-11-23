@extends('layouts.admin')

@section('title','Add product')

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css')}}" rel="stylesheet">
</link>
@endsection

@section('content')
<div class="content-wrapper">

    @include('partials.content-header', ['name' => 'Procduct','key' => 'Add'])

    <form action="{{ route('products.update',['id' => $product->id] )}}" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    @csrf
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="name" value="{{ $product->name }}">
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" class="form-control" placeholder="Nhập giá sản phẩm" name="price" value="{{ $product->price }}">
                        </div>

                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input type="file" class="form-control-file" name="feature_image_path">
                            <div class="col-md-3 container_feature_image">
                                <div class="row">
                                    <img class="feature_image" src="{{ $product->feature_image_path}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Ảnh chi tiết</label>
                            <input type="file" multiple class="form-control-file" name="image_path[]">
                            <div class="col-md-12 image_detail_container">
                                <div class="row">
                                    @foreach($product->images as $productImageItem)
                                    <div class="col-md-3">
                                        <img class="image_detail_product" src="{{ $productImageItem->image_path }}" alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Chọn danh mục</label>
                            <select class="form-control select2_init" name="category_id">
                                <option value="0">Chon danh muc cha</option>
                                {{!!$htmlOption!!}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nhập tags sản phẩm</label>
                            <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                @foreach($product->tags as $productTagItem)
                                <option value="{{$productTagItem->name}}" selected>{{$productTagItem->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Nhập nội dung</label>
                            <textarea name="content" class="form-control tinymce_edit_init" id="exampleFormControlTextarea1" rows="3">{{ $product->content }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>

                </div>
            </div>
            <!-- /.content -->
        </div>
    </form>
</div>
<!-- /.content-wrapper -->
@endsection
@section('js')

<script src="{{ asset('vendors/select2/select2.min.js')}}"></script>
<script src="{{ asset('admins/product/add/add.js')}}"></script>
<script src="https://cdn.tiny.cloud/1/d9jb4kkyb2rsnkfy0y3yn92n75fnqhhsa8qa8v55d2x9p1fy/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection