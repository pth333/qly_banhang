@extends('layouts.admin')

@section('title','Add product')

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css')}}" rel="stylesheet">
</link>
@endsection

@section('content')
<div class="content-wrapper">

    @include('partials.content-header', ['name' => 'Procduct','key' => 'Edit'])
    <form action="{{ route('products.store')}}" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">

                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên sản phẩm" name="name" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="Nhập giá sản phẩm" name="price" value="{{ old('price') }}">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input type="file" class="form-control-file" name="feature_image_path">
                        </div>
                        <div class="form-group">
                            <label>Ảnh chi tiết</label>
                            <input type="file" multiple class="form-control-file" name="image_path[]">
                        </div>
                        <div class="form-group">
                            <label>Chọn danh mục</label>
                            <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id" value="{{ old('category_id') }}">
                                <option value="">Chọn danh mục</option>
                                {!! $htmlOption !!}
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nhập tags sản phẩm</label>
                            <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Nhập nội dung</label>
                            <textarea name="content" class="form-control tinymce_edit_init @error('content') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3">
                            {{ old('content') }}
                            </textarea>
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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