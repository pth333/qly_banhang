@extends('layouts.admin')

@section('title','Sửa  slider')
@section('css')
<link rel="stylesheet" href="{{ asset('admins/slider/add/add.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
   
    @include('partials.content-header', ['name' => 'Slider','key' => 'Edit'])
   

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('roles.update',['id' => $slider->id])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tên Slider</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên slider" name="name" value="{{ $slider->name}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="description" class="form-control  @error('description') is-invalid @enderror" rows="4"> {{ $slider->description}}</textarea>

                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control  @error('image_path') is-invalid @enderror" placeholder="Nhập mô tả" name="image_path">
                            <div class="col-md-4">
                                <div class="row">
                                    <img class="image_detail_slider" src="{{$slider->image_path}}" alt="">
                                </div>
                            </div>
                            @error('image_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
@endsection
<!-- Content Wrapper. Contains page content -->