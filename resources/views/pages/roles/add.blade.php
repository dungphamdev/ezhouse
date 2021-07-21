@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        {{-- @lang('cruds.role.title') --}}
                        Thêm mới nhóm người dùng
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">
                            {{-- @lang('global.home') --}}
                            Trang chủ
                        </a></li>
                        <li class="breadcrumb-item"><a href="{{ route('roleIndex') }}">
                            {{-- @lang('cruds.role.title') --}}
                            Người dùng
                        </a></li>
                        <li class="breadcrumb-item active">
                            {{-- @lang('global.add') --}}
                            Thêm mới
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
                            {{-- @lang('global.add') --}}
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('roleCreate') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>
                                    {{-- @lang('cruds.role.fields.name') --}}
                                    Tên
                                </label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? "is-invalid":"" }}" value="{{ old('name') }}" required>
                                @if($errors->has('name') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <select multiple="multiple" name="permissions[]" size="30" class="duallistbox" aria-multiselectable="true">
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    {{-- @lang('cruds.role.fields.title') --}}
                                    Tiêu đề
                                </label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">
                                    {{-- @lang('global.save') --}}
                                    Lưu
                                </button>
                                <a href="{{ route('roleIndex') }}" class="btn btn-default float-left">
                                    {{-- @lang('global.cancel') --}}
                                    Hủy
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
