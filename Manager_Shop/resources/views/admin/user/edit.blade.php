@extends('layouts.admin')

@section('title','Thêm user')
@section('css')
<link rel="stylesheet" href="{{ asset('admins/slider/add/add.css')}}">
<link href="{{ asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<style>
    .select2-selection__choice {
        background-color: blueviolet !important;
    }
</style>
@endsection
@section('content')
<div class="content-wrapper">

    @include('partials.content-header', ['name' => 'User','key' => 'Edit'])
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('users.update',['id' => $user->id] )}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" class="form-control" placeholder="Nhập tên" name="name" value="{{ $user->name}}">

                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="Nhập email" name="email" value="{{ $user->email}}">

                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Nhập password" name="password">

                        </div>
                        <!-- Chưa nhận đc thông tin nhập vào -> xem lại -->
                        <div class="form-group">
                            <label>Chọn vai trò</label>
                            <select name="role_id[]" class="form-control tags_select_choose" multiple>
                                <option value=""></option>
                                @foreach($user->roles as $role)
                                <option selected value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>

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
<script src="{{ asset('vendors/select2/select2.min.js')}}"></script>
<script>
    $(function() {
        $(".tags_select_choose").select2({
            'placeholder': 'Chọn vai trò',
            tags: true,
            tokenSeparators: [',']
        });
    })
</script>
@endsection