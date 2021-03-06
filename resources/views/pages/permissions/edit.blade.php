@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        {{-- @lang('cruds.permission.title') --}}
                        Chỉnh sửa quyền
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">
                            {{-- @lang('global.home') --}}
                            Trang chủ
                        </a></li>
                        <li class="breadcrumb-item"><a href="{{ route('permissionIndex') }}">
                            {{-- @lang('cruds.permission.title') --}}
                            Quyền
                        </a></li>
                        <li class="breadcrumb-item active">
                            {{-- @lang('global.edit') --}}
                            Chỉnh sửa
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{-- @lang('global.edit') --}}
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('permissionUpdate',$permission->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>
                                    {{-- @lang('cruds.permission.fields.name') --}}
                                    Tên
                                </label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? "is-invalid":"" }}" value="{{ old('name',$permission->name) }}" required>
                                @if($errors->has('name') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>
                                    {{-- @lang('cruds.permission.fields.title') --}}
                                    Tiêu đề
                                </label>
                                <input type="text" name="title" class="form-control" value="{{ old('title',$permission->title) }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">
                                    {{-- @lang('global.save') --}}
                                    Lưu
                                </button>
                                <a href="{{ route('permissionIndex') }}" class="btn btn-default float-left">
                                    {{-- @lang('global.cancel') --}}
                                    Xóa
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
