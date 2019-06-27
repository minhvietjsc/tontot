@extends('layouts.app')
@section('content')
    <style>        .main-container{
            padding: 30px 0;
        }
        #preview_profile{
            display: block;
            height: 60px;
            margin-bottom: 10px;
        }
        .userImg{ height: 55px; }
    </style>    
<div class="main-container">
    <div class="container">
        <div class="row">
            @include('user.sidebar')

            <div class="col-sm-9 row page-content">
                <div class="inner-box">
                    <h2 class="title-2"><i class="icon-docs"></i> Đơn hàng của tôi </h2>
                    <div class="table-responsive">
                    <table id="load_datatable" class="table table-colored table-inverse table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên người bán</th>
                            <th>Tên khách hàng</th>
                            <th>Ghi chú</th>
                            <th>Tổng hóa đơn</th>
                            <th>Hình thức thanh toán</th>
                            <th>Ngày đặt hàng</th>
                            <th>Trạng thái&nbsp;|&nbsp;Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="4">Không có dữ liệu.</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modelTitleId">Chi tiết đơn hàng</h4>
            </div>
            <div class="modal-body" style="height: 400px; overflow: auto;"></div>
            <div class="modal-footer">
                Tổng đơn hàng: <span id="total" style="color: #f68121; font-size: 18px;"></span>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#load_datatable').DataTable({
            "pageLength":25,
            "order": [[7, 'desc']],
            processing: true,
            serverSide: true,
            "initComplete": function (settings, json) {
            },
            ajax: "{!! url('load-my-orders') !!}",
            columns: [
                {data: 'id', name: 'orders.id'},
                {data: 'name', name: 'users.name'},
                {data: 'customer_name', name: 'orders.customer_name'},
                {data: 'description', name: 'orders.description'},
                {data: 'payment_method', name: 'orders.payment_method'},
                {data: 'pay_total', name: 'orders.pay_total'},
                {data: 'created_at', name: 'orders.created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
                //{ data: 'updated_at', name: 'updated_at' }
            ]
        });
    });
</script>
@endsection