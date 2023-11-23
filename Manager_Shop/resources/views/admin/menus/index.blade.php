@extends('layouts.admin')

@section('title','Menu List')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'Menu','key' => 'List'])

    <!-- Main content -->
    <div class="card">
        <div class="card-header">
            <div class="row">

                <div class="col col-md-12">
                    <a href="{{ route('menus.create')}}" class="btn btn-success btn-sm float-right">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>STT</th>
                    <th>Ten Menu</th>
                    <th>Action</th>

                </tr>
                @if(count($menus) > 0)

                @foreach($menus as $menu)

                <tr>
                    <td>{{ $menu->id}}</td>
                    <td>{{ $menu->name }}</td>

                    <td>
                        <form method="post" action="{{ route('menus.destroy', ['id' => $menu->id])}}">
                            @csrf
                            @method('DELETE')
                            <a href="" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('menus.edit', ['id' => $menu->id])}}" class="btn btn-warning btn-sm">Edit</a>
                            <input onclick="return confirm('Bạn có chắc muốn xóa không ?')" type="submit" class="btn btn-danger btn-sm" value="Delete" />
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
            {{ $menus->links('pagination::bootstrap-4') }}
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
<!-- Content Wrapper. Contains page content -->