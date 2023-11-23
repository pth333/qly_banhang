@extends('layouts.admin')

@section('title','User List')
@section('css')
<link rel="stylesheet" href="{{ asset('admins/slider/index/index.css') }}">
@endsection
@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'User','key' => 'List'])


    <div class="card">
        <div class="card-header">
            <div class="row">

                <div class="col col-md-12">
                    <a href="{{ route('users.create')}}" class="btn btn-success btn-sm float-right">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Action</th>

                </tr>
                @if(count($users) > 0)

                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id}}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>

                    <td>
                        <form method="post">
                            @csrf
                            @method('DELETE')
                            <a href="" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('users.edit',['id' => $user->id] ) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href=""
                            data-url="{{ route('users.destroy',['id' => $user->id])}}" 
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
            {{ $users->links('pagination::bootstrap-4') }}
        </div>

    </div>

</div>

@endsection
@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert.min.js') }}"></script>
<script src="{{ asset('admins/main.js') }}"></script>
@endsection