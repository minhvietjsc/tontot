@extends('admin.layout.app')
@section('content')
<style>
    .label {
        margin-right: 2px;
    }
    .file_hidden{
        display: none !important;
    }
    #preview_slider{
        display: block;
        height: 60px;
        margin-bottom: 10px;
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
                        <li class="active"> Thêm slider </li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-xs-12">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="panel panel-color panel-inverse">
                            <div class="panel-heading">
                                <h3 class="panel-title">Thêm slider</h3>
                            </div>
                            <div class="panel-body">

                                <form action="{{isset($model->id) ? route('slider.pEdit') : route('slider.pAdd')}}" onsubmit="showLoading()" method="post" id="sliderForm" autocomplete="off" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ isset($model->id) ? $model->id : '' }}" name="id">
                                    <div class="form-group">
                                        <label class="col-xs-2 control-label">Chọn ảnh:</label>
                                        <div class="col-xs-10">
                                            <img id="preview_slider" src="<?= ( isset($model) && $model->path !="")? asset($model->path) : '' ?>" alt="" class="img-responsive">
                                            <input type="file" name="slider" class="form-control file_hidden">
                                            <button id="browse_profile" class="btn w-md btn-bordered btn-success waves-effect waves-ligh " type="button">Chọn tệp</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Tên ảnh </label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ isset($model->title) ? $model->title : '' }}" required />
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Trang liên kết </label>
                                        <input type="text" class="form-control" id="link" name="link" value="{{ isset($model->link) ? $model->link : '' }}" />
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success"> Lưu </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script>

        $(document).on('keypress', '#title', function (event) {
            var regex = new RegExp("^[a-zA-Z1-9 ]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });
        function showLoading() {
            $('#loading').show();
        }
        $(document).ready(function(){

            // browse image
            $('#browse_profile').click( function(){
                $('.file_hidden').click();
            });

            // profile preview
            function readURL(input, id) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#'+id).attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".file_hidden").change(function() {
                readURL(this, 'preview_slider');
            });

            /*// ajax submit form
            $("#sliderForm").submit(function(){
                $('#loading').show();
                var data = new FormData(this);
                data.append('contents', CKEDITOR.instances.content.getData());

                $.ajax({
                    url: "",
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
                                $("#sliderForm")[0].reset();
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
            });*/
        });
    </script>
@endsection
