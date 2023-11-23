@extends('layouts.admin')

@section('title','Thêm permission')

@section('content')
<div class="content-wrapper">

    @include('partials.content-header', ['name' => 'Permission','key' => 'Add'])

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('permission.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Chon tên module</label>

                            <select class="form-control" name="module_parent">
                                <option value="">Chon tên module</option>
                                @foreach(config('permission.table_module') as $moduleItem)
                                <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                @foreach(config('permission.module_children') as $moduleItem)
                                <div class="col-md-3">
                                    <label for="">
                                        <input type="checkbox" value="{{$moduleItem}}" name="module_children[]">
                                        {{$moduleItem}}
                                    </label>
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
