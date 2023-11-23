@extends('layouts.admin')

@section('title','Page Setting')
@section('css')
<link rel="stylesheet" href="{{ asset('admins/setting/index/index.css')}}">
@endsection
@section('content')
<div class="content-wrapper">

    @include('partials.content-header', ['name' => 'Setting','key' => 'List'])
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group float-right">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Add Setting
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('settings.create') . '?type=Text' }}">Text</a>
                            <a class="dropdown-item" href="{{ route('settings.create') . '?type=Textarea' }}">Textarea</a>
                        </div>
                    </div>


                </div>

            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>STT</th>
                    <th>Config key</th>
                    <th>Config value</th>

                </tr>
                @if(count($settings) > 0)

                @foreach($settings as $setting)

                <tr>
                    <td>{{ $setting->id}}</td>
                    <td>{{ $setting->config_key }}</td>
                    <td>{{ $setting->config_value }}</td>

                    <td>
                        <form method="post">
                            @csrf
                            @method('DELETE')
                            <a href="" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('settings.edit',['id' => $setting->id]) . '?type=' . $setting->type }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="" 
                            data-url="{{ route('settings.destroy', ['id' => $setting->id]) }}" 
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
            {{ $settings->links('pagination::bootstrap-4') }}
        </div>
    </div>

</div>

@endsection
@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert.min.js') }}"></script>
<script src="{{ asset('admins/main.js') }}"></script>
@endsection