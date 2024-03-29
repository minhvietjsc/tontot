@extends('layouts.app')

@section('content')

    <style>

        .main-container{

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

                        <h2 class="title-2"><i class="icon-docs"></i> Quảng cáo không hoạt động của tôi.</h2>

                        <div class="table-responsive">



                            <table id="load_datatable" class="table table-striped table-bordered add-manage-table table demo footable-loaded footable">

                                <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Tiêu đề</th>

                                    <th>Danh mục</th>

                                    <th>Khu vực</th>

                                    <th>Thành phố</th>

                                    <th>Giá</th>

                                    <th>Ngày tạo</th>

                                    <th width="80">Tùy chọn</th>

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

                "order": [[0, 'desc']],

                processing: true,

                serverSide: true,

                "initComplete": function (settings, json) {



                },



                ajax: "{!! url('load-my-ads') !!}?load_ads=inactive",

                columns: [

                    {data: 'id', name: 'id'},

                    {data: 'title', name: 'ads.title'},

                    {data: 'category_title', name: 'categories.name'},

                    {data: 'region_title', name: 'region.title'},

                    {data: 'city_title', name: 'city.title'},

                    {data: 'price', name: 'ads.price'},

                    {data: 'created_at', name: 'ads.created_at'},

                    {data: 'action', name: 'action', orderable: false, searchable: false}

                    //{ data: 'updated_at', name: 'updated_at' }

                ]

            });

        });

    </script>





@endsection

