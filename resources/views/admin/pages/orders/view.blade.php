@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h3 class="card-title">Đơn hàng</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order['name'] }}</td>
                                            <td>{{ $order['telephone'] }}</td>
                                            <td>{{ $order['address'] }}</td>
                                            <td>{{ number_format($order['total']) }} VND</td>
                                            <td>
                                                @if($order['status'] == 0 )
                                                    <a href="{{ route('orders.update', $order['id']) }}" rel="tooltip"
                                                       data-original-title="Click để thay đổi trạng thái">Chưa thanh
                                                        toán</a>
                                                @endif
                                                @if($order['status'] == 1 )
                                                    Đã thanh toán
                                                @endif
                                            </td>
                                            <td class="td-actions text-right">
                                                <a href="{{ URL::route('orders.details', $order['id']) }}">
                                                    <button type="button" rel="tooltip" class="btn btn-info btn-round"
                                                            data-original-title="Chi tiết" title="">
                                                        <i class="material-icons">visibility</i>
                                                    </button>
                                                </a>
                                                <a href="{{ URL::route('orders.delete', $order['id']) }}">
                                                    <button type="button" rel="tooltip" class="btn btn-danger btn-round"
                                                            data-original-title="Xóa" title="">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


