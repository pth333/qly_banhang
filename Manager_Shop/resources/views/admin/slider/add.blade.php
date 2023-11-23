@extends('layouts.admin')

@section('title','Them slider')
@section('css')
<link rel="stylesheet" href="{{ asset('admins/slider/add/add.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
 
    @include('partials.content-header', ['name' => 'Slider','key' => 'Add'])
 
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('slider.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên Slider</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên slider" name="name" value="{{ old('name')}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="description" class="form-control  @error('description') is-invalid @enderror" rows="4"> {{ old('description')}}</textarea>

                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control  @error('image_path') is-invalid @enderror" placeholder="Nhập mô tả" name="image_path">
                            @error('image_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
      
    </div>
</div>

@endsection
