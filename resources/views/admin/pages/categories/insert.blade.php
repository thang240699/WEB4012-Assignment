@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose">
                            <h4 class="card-title ">THÊM DANH MỤC</h4>
                        </div>
                        <div class="card-body">
                            <form action="{!! route('categories.insert') !!}" enctype="multipart/form-data" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Mã danh mục (Tự tăng)</label>
                                    <input type="text" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Tên danh mục</label>
                                    <input name="name" type="text" class="form-control">
                                </div>
                                <label>Hình ảnh: </label>
                                <input name="image" class="form-control" type="file">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <button type="submit" class="btn btn-danger">Thêm</button>
                            </form>
                            <a class="nav-link" href="view">
                                <button type="button" class="btn btn-danger">Danh sách danh mục</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

