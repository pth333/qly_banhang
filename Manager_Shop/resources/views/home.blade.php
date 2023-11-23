@extends('layouts.admin')

@section('title','Page Title')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'Home','key' => 'List'])

    <!-- Main content -->
    <div class="card">
        <div class="card-header">
            <div class="row">

                <div class="col col-md-12">
                    <a href="{{ route('categories.create')}}" class="btn btn-success btn-sm float-right">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            Trang chu

        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
<!-- Content Wrapper. Contains page content -->