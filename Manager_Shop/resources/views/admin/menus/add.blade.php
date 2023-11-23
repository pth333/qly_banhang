@extends('layouts.admin')

@section('title','Them menu')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'Menu','key' => 'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('menus.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Ten menu</label>
                            <input type="text" class="form-control" placeholder="Nhap ten menu" name="name">
                        </div>
                        <div class="form-group">
                            <label>Chon menu cha</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">Chon menu cha</option>
                             {{!!$optionSelect!!}}
                            </select>
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