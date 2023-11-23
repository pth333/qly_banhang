@extends('layouts.admin')

@section('title','Page Title')

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Category','key' => 'List'])


    <div class="card">
        <div class="card-header">
            <div class="row">
                @can('category_add')
                <div class="col col-md-12">
                    <a href="{{ route('categories.create')}}" class="btn btn-success btn-sm float-right">Add</a>
                </div>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Action</th>

                </tr>
                @if(count($categories) > 0)

                @foreach($categories as $category)

                <tr>
                    <td>{{ $category->id}}</td>
                    <td>{{ $category->name }}</td>

                    <td>
                        <form method="post">
                            @csrf
                            @method('DELETE')
                            <a href="" class="btn btn-primary btn-sm">View</a>
                            @can('category_edit')
                            <a href="{{ route('categories.edit',['id' => $category->id])}}" class="btn btn-warning btn-sm">Edit</a>
                            @endcan
                            @can('category_delete')
                            <a data-url="{{ route('categories.destroy', ['id' => $category->id]) }}" class="btn btn-danger btn-sm action_delete">Delete</a>
                            @endcan
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
            {{ $categories->links('pagination::bootstrap-4') }}
        </div>
    </div>

</div>

@endsection
@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert.min.js') }}"></script>
<script src="{{ asset('admins/main.js') }}"></script>
@endsection