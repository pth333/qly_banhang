@extends('layouts.admin')

@section('title','Slider List')
@section('css')
<link rel="stylesheet" href="{{ asset('admins/slider/index/index.css') }}">
@endsection
@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Slider','key' => 'List'])


    <div class="card">
        <div class="card-header">
            <div class="row">

                <div class="col col-md-12">
                    <a href="{{ route('slider.create')}}" class="btn btn-success btn-sm float-right">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>STT</th>
                    <th>Tên Slider</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Action</th>

                </tr>
                @if(count($slider) > 0)

                @foreach($slider as $sliderItem)
                <tr>
                    <td>{{ $sliderItem->id}}</td>
                    <td>{{ $sliderItem->name}}</td>
                    <td>{{ $sliderItem->description}}</td>
                    <td>
                        <img class="image_slider" src="{{ $sliderItem->image_path}}" alt="">
                    </td>

                    <td>
                        <form method="post">
                            @csrf
                            @method('DELETE')
                            <a href="" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('slider.edit',['id' => $sliderItem->id])}}" class="btn btn-warning btn-sm">Edit</a>
                            <a data-url="{{ route('slider.destroy', ['id' => $sliderItem->id]) }}" 
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
            {{ $slider->links('pagination::bootstrap-4') }}
        </div>

    </div>

</div>

@endsection
@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert.min.js') }}"></script>
<script src="{{ asset('admins/main.js') }}"></script>
@endsection