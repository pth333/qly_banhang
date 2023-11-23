@extends('layouts.admin')

@section('title','Thêm vai trò')
@section('css')
<link rel="stylesheet" href="{{ asset('admins/slider/add/add.css')}}">
@endsection
@section('content')
<div class="content-wrapper">

    @include('partials.content-header', ['name' => 'Roles','key' => 'Add'])

    <div class="card">
        <div class="card-header">
            <div class="row">
                <form action="{{ route('roles.store')}}" method="post" enctype="multipart/form-data" style="width: 100%">
                    <div class="col-md-12">

                        @csrf
                        <div class="form-group">
                            <label>Tên vai trò</label>
                            <input type="text" class="form-control " placeholder="Nhập tên vai trò" name="name" value="{{ old('name')}}">

                        </div>
                        <div class="form-group">
                            <label>Mô tả vai trò</label>
                            <textarea name="display_name" class="form-control" rows="4"> {{ old('display_name')}}</textarea>
                        </div>


                    </div>

                    <div class="form" style="padding: 0px 7.5px;">

                        <div class="col-md-12">

                            <div class="row">
                                <div class="checkall" >
                                    <label>
                                        <input type="checkbox" class="check_all">
                                        Check All
                                    </label>
                                </div>
                                @foreach($permisstionParent as $permisstionParentItem)
                                <div class="card border-primary col-md-12">

                                    <div class="card-header">

                                        <label>
                                            <input type="checkbox" value="{{$permisstionParentItem->id}}" class="checkbox_wrapper">
                                        </label>
                                        Module {{$permisstionParentItem->name}}

                                    </div>

                                    <div class="row">
                                        <!-- dd({{$permisstionParentItem}}) -->

                                        @foreach($permisstionParentItem->permisstionChildren as $permisstionChildrenItem) <div class="card-body text-primary col-md-3">

                                            <h5 class="card-title">
                                                <label>
                                                    <input type="checkbox" value="{{$permisstionChildrenItem->id}}" name="permisstion_id[]" class="checkbox_children">
                                                </label>
                                                {{$permisstionChildrenItem->name}}
                                            </h5>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>


        </div>

    </div>

</div>
</div>



@endsection
@section('js')
<script src="{{ asset('admins/roles/add/add.js')}}"></script>
@endsection