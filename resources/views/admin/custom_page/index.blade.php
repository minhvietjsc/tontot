@extends('admin.layout.app')
@section('content')
<style>
    .label {
        margin-right: 2px;
    }
</style>
    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            <div class="col-xs-12">
                <div class="page-title-box">
                    <h4 class="page-title">Dashboard</h4>
                    <ol class="breadcrumb p-0 m-0">
                        <li> <a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="active"> Trang tùy chỉnh </li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-xs-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="col-xs-12">
                    <div class="row">
                        <div class="panel panel-color panel-inverse">
                            <div class="panel-heading">
                                <h3 class="panel-title">Trang tùy chỉnh</h3>
                            </div>
                            <div class="panel-body">

                                <form action="" method="post" id="customForm" autocomplete="off">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ isset($page->id) ? $page->id : '' }}" name="id">
                                    <div class="form-group">
                                        <label for=""> Tên của trang </label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ isset($page->title) ? $page->title : '' }}" required />
                                    </div>

                                    <div class="form-group">
                                        <label style="display: block;">Chọn kiểu trang tùy chỉnh</label>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="inlineRadio1" value="1" name="type" {{ ((isset($page) && $page->type == 1) || (!isset($page)) ? 'checked' : '') }}>
                                            <label for="inlineRadio1">Về chúng tôi</label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="inlineRadio2" value="2" name="type" {{ (isset($page) && $page->type == 2 ? 'checked' : '') }}>
                                            <label for="inlineRadio2">Dành cho người mua </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="inlineRadio3" value="3" name="type" {{ (isset($page) && $page->type == 3 ? 'checked' : '') }}>
                                            <label for="inlineRadio3">Dành cho người bán</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for=""> Nội dung trang </label>
                                        <textarea class="form-control" id="content" required >{!! isset($page->contents) ? $page->contents : '' !!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success"> Lưu </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="{!! asset('assets/js/ckeditor/ckeditor.js') !!}"></script>
    <script>

        $(document).on('keypress', '#title', function (event) {
            var regex = new RegExp("^[a-zA-Z ]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        $(document).ready(function(){

            // ck editor1
            var editor = CKEDITOR.replace('content',{
                allowedContent: true,
            });

            // ajax submit form
            $("#customForm").submit(function(){
                $('#loading').show();
                var data = new FormData(this);
                data.append('contents', CKEDITOR.instances.content.getData());

                $.ajax({
                    url: "<?php  echo route('custom-page.store'); ?>",
                    data: data,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function(result){
                        $('#loading').hide();
                        if(result.msg == 1){
                            swal({
                                title: "Success!",
                                text: "Trang đã được lưu thành công!",
                                type: "success",
                                confirmButtonText: "OK"
                            });
                            CKEDITOR.instances.content.setData('');
                            @if (!isset($page->id)) 
                                $("#customForm")[0].reset();
                            @endif

                        }else if(result.msg == 3){
                            swal("Error!", "Tên trang đã tồn tại", "error");
                        }else{
                            swal("Error!", "Đã xảy ra sự cố.", "error");
                            $('#loading').hide();
                        }
                    }
                });
                return false;
            });
        });
    </script>
@endsection
