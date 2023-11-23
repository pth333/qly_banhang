@extends('layouts.admin')

@section('title','Roles List')

@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Roles','key' => 'List'])


    <div class="card">
        <div class="card-header">
            <div class="row">

                <div class="col col-md-12">
                    <a href="{{ route('roles.create')}}" class="btn btn-success btn-sm float-right">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>STT</th>
                    <th>Tên vai trò</th>
                    <th>Mô tả vai trò</th>
                    <th>Action</th>

                </tr>
                @if(count($roles) > 0)

                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id}}</td>
                    <td>{{ $role->name}}</td>
                    <td>{{ $role->display_name}}</td>


                    <td>
                        <form method="post">
                            @csrf
                            @method('DELETE')
                            <a href="" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('roles.edit', ['id' => $role->id] )}}" class="btn btn-warning btn-sm">Edit</a>
                            <a data-url="{{ route('roles.destroy',['id' => $role->id] )}}" class="btn btn-danger btn-sm action_delete">Delete</a>
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
            {{ $roles->links('pagination::bootstrap-4') }}
        </div>

    </div>

</div>

@endsection
@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert.min.js') }}"></script>
<script src="{{ asset('admins/main.js') }}"></script>
@endsection