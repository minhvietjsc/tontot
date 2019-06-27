@extends('admin.layout.app')
@section('content')
<style>
    .add_more{float: right; margin-bottom: 5px;
    }
    table.dataTable thead th.sorting:after, table.dataTable thead th.sorting_asc:after, table.dataTable thead th.sorting_desc:after {
        top: 17px;
    }
    .table-bordered.dataTable > thead > tr > td, .table-bordered.dataTable > thead > tr > th {
        vertical-align: middle;
    }
</style>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li> <a href="{{ url('dashboard') }}">Dashboard</a></li>
                    <li class="active"> Ảnh Slider </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-xs-12">
            @if(\Session::has('slider_success'))
                <div class="alert alert-success">
                    {{ \Session::get('slider_success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
           @endif

            <div class="card-box">
                <div class="row">
                    <div class="col-xs-12 bg-white">
                        <table id="load_datatable" class="table table-colored table-inverse table-hover table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên ảnh</th>
                                <th>Ảnh hiển thị</th>
                                <th>Trang liên kết</th>
                                <th>Ngày tạo</th>
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
<script>
    $(document).ready(function(){
        $('#load_datatable').DataTable({
            "pageLength":25,
            "order": [[5, 'desc']],
            processing: true,
            serverSide: true,
            "initComplete": function (settings, json) {
            },
            ajax: "{!! url('load-slider-list') !!}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'path', name: 'path'},
                {data: 'link', name: 'link'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
                //{ data: 'updated_at', name: 'updated_at' }
            ]
        });
        
            
    });
</script>
@endsection