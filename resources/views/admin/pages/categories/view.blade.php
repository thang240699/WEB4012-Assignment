@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose">
                            <h4 class="card-title ">DANH MỤC</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign"><span class="check"></span></span></label>
                                                </div>
                                            </th>
                                            <th>{{ $category['id'] }}</th>
                                            <th>{{ $category['name'] }}</th>
                                            <th>{{ $category['image'] }}</th>
                                            <th class="td-actions text-right">
                                                <a href="{{ URL::route('categories.update',$category['id']) }}">
                                                    <button type="button" rel="tooltip" title="" class="btn btn-success"
                                                            data-original-title="Sửa">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </button>
                                                </a>
                                                <a onclick="return checkDelete('Bạn có chắn là muốn xoá không?')"
                                                   href="{{ URL::route('categories.delete',$category['id']) }}">
                                                    <button type="button" rel="tooltip" title="" class="btn btn-danger"
                                                            data-original-title="Xoá">
                                                        <i class="material-icons">close</i>
                                                        <div class="ripple-container"></div>
                                                    </button>
                                                </a>
                                            </th>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <a class="btn btn-danger" href="add">
                                    Thêm danh mục
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

