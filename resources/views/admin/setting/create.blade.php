@extends('admin.layout.app')
@section('title', 'Setting')
@section('content')
    <link href="{{ asset('admin_assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
    <style>
        form#add_category .loader {
            float: right;
            margin-left: 5px;
            margin-top: 6px;
        }
        form#add_category .loader img{
            display: none;
        }
        .file_hidden{
            display: none !important;
        }
        #preview_profile{
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
                        <li> <a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li class="active"> Cấu hình website </li>
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
                                <h3 class="panel-title">Cấu hình website</h3>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" id="setting" method="post" action="{{ route('setting.store') }}"  enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ (isset($data->id) && $data->id != "")? $data->id :''  }}">

                                    <div class="form-group">
                                        <label class="col-xs-2 control-label">Ảnh Logo:</label>
                                        <div class="col-xs-10">
                                            <img id="preview_profile" src="<?= ( isset($data) && $data->logo !="")? asset('assets/images/logo/'.$data->logo.' ') : asset('assets/images/logo/logo.png') ?>" alt="" class="img-responsive">
                                            <input type="file" name="logo" class="form-control file_hidden">
                                            <button id="browse_profile" class="btn w-md btn-bordered btn-success waves-effect waves-ligh " type="button">Chọn tệp</button>
                                        </div>
                                    </div>

                                    <div class="form-group account-btn m-t-10">
                                        <label class="col-xs-2 control-label">Tên website:</label>
                                        <div class="col-xs-10">
                                            <input type="text" name="title" class="form-control" value="{{ (isset($data->title)? $data->title : '') }}" placeholder="example.com">
                                        </div>
                                    </div>
                                    <div class="form-group account-btn m-t-10">
                                        <label class="col-xs-2 control-label">Email liên hệ:</label>
                                        <div class="col-xs-10">
                                            <input type="email" name="contact_email" required class="form-control" value="{{ (isset($data->contact_email)? $data->contact_email : '') }}" placeholder="info@example.com">
                                            <small><i class="fa fa-warning text-danger"></i> Vui lòng nhập email liên hệ để người dùng có thể gửi email liên hệ. </small>
                                        </div>
                                    </div>

                                    <div class="form-group account-btn m-t-10">
                                        <label class="col-xs-2 control-label">Số điện thoại (hotline):</label>
                                        <div class="col-xs-10">
                                            <input type="text" name="hotline" required class="form-control" value="{{ (isset($data->hotline)? $data->hotline : '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group account-btn m-t-10">
                                        <label class="col-xs-2 control-label">Đơn vị tiền tệ:</label>
                                        <div class="col-xs-3">
                                            <input type="text" name="currency" class="form-control" value="{{ (isset($data->currency)? $data->currency : '') }}" placeholder="$, €, Rs etc">
                                            <small> Bạn có thể thêm biểu tượng đơn vị tiền tệ! </small>
                                        </div>
                                        <div class="col-xs-7">
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio2" value="left" name="currency_place" {{ (isset($data->currency_place) && $data->currency_place == 'left' ? 'checked' : '') }}>
                                                <label for="inlineRadio2"> <strong>Trái</strong> ( $123 ) </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="right" name="currency_place" {{ (isset($data->currency_place) && $data->currency_place == 'right' ? 'checked' : '') }}>
                                                <label for="inlineRadio1"> <strong> Phải </strong> ( 123 Rs ) </label>
                                            </div>

                                            <small style="display: block"> Chọn vị trí ký hiệu tiền tệ </small>

                                        </div>
                                    </div>
                                    <div class="form-group account-btn m-t-10">
                                        <label class="col-xs-2 control-label">Bản quyền:</label>
                                        <div class="col-xs-10">
                                            <input type="text" name="copy_right_text" class="form-control" value="{{ (isset($data->copy_right_text)? $data->copy_right_text : '') }}" placeholder="© example.com">
                                        </div>
                                    </div>
                                    <!-- Body bg -->
                                    <div class="form-group account-btn m-t-10">
                                        <label class="col-xs-2 control-label">Màu nền website:</label>
                                        <div data-color-format="rgb" data-color="{{ (isset($data->body_bg)? $data->body_bg : '') }}" class="colorpicker-default input-group col-xs-10">
                                            <input type="text" name="body_bg" readonly="readonly" value="{{ (isset($data->body_bg)? $data->body_bg : '') }}" class="form-control">
                                            <span class="input-group-btn add-on">
                                                <button class="btn btn-white" type="button">
                                                    <i style="background-color: {{ (isset($data->body_bg)? $data->body_bg : '') }};margin-top: 2px;"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group account-btn m-t-10">
                                        <label class="col-xs-2 control-label">Màu nền thành điều hướng:</label>
                                        <div data-color-format="rgb" data-color="{{ (isset($data->nav_bg)? $data->nav_bg : '') }}" class="colorpicker-default input-group col-xs-10">
                                            <input type="text" name="nav_bg" readonly="readonly" value="{{ (isset($data->nav_bg)? $data->nav_bg : '') }}" class="form-control">
                                            <span class="input-group-btn add-on">
                                                <button class="btn btn-white" type="button">
                                                    <i style="background-color: {{ (isset($data->nav_bg)? $data->nav_bg : '') }};margin-top: 2px;"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group account-btn m-t-10">
                                        <label class="col-xs-2 control-label">Màu nền chân trang:</label>
                                        <div data-color-format="rgb" data-color="{{ (isset($data->footer_bg)? $data->footer_bg : '') }}" class="colorpicker-default input-group col-xs-10">
                                            <input type="text" name="footer_bg" readonly="readonly" value="{{ (isset($data->footer_bg)? $data->footer_bg : '') }}" class="form-control">
                                            <span class="input-group-btn add-on">
                                                <button class="btn btn-white" type="button">
                                                    <i style="background-color: {{ (isset($data->footer_bg)? $data->footer_bg : '') }};margin-top: 2px;"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group account-btn m-t-10">
                                        <label class="col-xs-2 control-label">Màu Tiêu đề liên kết ở chân trang:</label>
                                        <div data-color-format="rgb" data-color="{{ (isset($data->footer_head_color)? $data->footer_head_color : '') }}" class="colorpicker-default input-group col-xs-10">
                                            <input type="text" name="footer_head_color" readonly="readonly" value="{{ (isset($data->footer_head_color)? $data->footer_head_color : '') }}" class="form-control">
                                            <span class="input-group-btn add-on">
                                                <button class="btn btn-white" type="button">
                                                    <i style="background-color: {{ (isset($data->footer_head_color)? $data->footer_head_color : '') }};margin-top: 2px;"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group account-btn m-t-10">
                                        <label class="col-xs-2 control-label">Màu liên kết ở chân trang:</label>
                                        <div data-color-format="rgb" data-color="{{ (isset($data->footer_link_color)? $data->footer_link_color : '') }}" class="colorpicker-default input-group col-xs-10">
                                            <input type="text" name="footer_link_color" readonly="readonly" value="{{ (isset($data->footer_link_color)? $data->footer_link_color : '') }}" class="form-control">
                                            <span class="input-group-btn add-on">
                                                <button class="btn btn-white" type="button">
                                                    <i style="background-color: {{ (isset($data->footer_link_color)? $data->footer_link_color : '') }};margin-top: 2px;"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-offset-1">
                                        <div class="form-group">
                                            <div class="checkbox checkbox-success checkbox-inline">
                                                <input id="social_links" name="social_links" type="checkbox" value="1" {{ (isset($data->social_links) && $data->social_links == 1)? 'checked' : ''   }}>
                                                <label for="social_links" class="text-bold">Liên kết mạng xã hội</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-offset-1 social_link m-t-10 m-b-10 {{ (isset($data->social_links) && $data->social_links == 1)? '' : 'hidden'   }}">
                                        <button type="button" class="btn btn-sm btn-facebook" onclick="$('.facebook').removeClass('hidden');" >facebook</button>
                                        <button type="button" class="btn btn-sm btn-linkedin" onclick="$('.linkedin').removeClass('hidden');" >Linkedin</button>
                                        <button type="button" class="btn btn-sm btn-twitter" onclick="$('.twitter').removeClass('hidden');" >Twitter</button>
                                        <button type="button" class="btn btn-sm btn-googleplus" onclick="$('.googleplus').removeClass('hidden');" >google plus</button>

                                        <div class="facebook {{ $data->facebook !='' ? '' : 'hidden' }} m-t-10">
                                            <div class="form-group">
                                                <label for="">Facebook Link</label>
                                                <input type="url" name="facebook" class="form-control" value="{{ $data->facebook !='' ? $data->facebook : '' }} ">
                                            </div>
                                        </div>

                                        <div class="linkedin {{ $data->linkedin !='' ? '' : 'hidden' }} m-t-10">
                                            <div class="form-group">
                                                <label for="">Linkedin Link</label>
                                                <input type="url" name="linkedin" class="form-control" value="{{ $data->linkedin !='' ? $data->linkedin : '' }} ">
                                            </div>
                                        </div>

                                        <div class="twitter {{ $data->twitter !='' ? '' : 'hidden' }} hiddenm-t-10">
                                            <div class="form-group">
                                                <label for="">Twitter Link</label>
                                                <input type="url" name="twitter" class="form-control" value="{{ $data->twitter !='' ? $data->twitter : '' }} ">
                                            </div>
                                        </div>

                                        <div class="googleplus {{ $data->googleplus !='' ? '' : 'hidden' }} m-t-10">
                                            <div class="form-group">
                                                <label for="">Googleplus Link</label>
                                                <input type="url" name="googleplus" class="form-control" value="{{ $data->googleplus !='' ? $data->googleplus : '' }} ">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-offset-1">
                                        <div class="form-group">
                                            <div class="checkbox checkbox-success checkbox-inline">
                                                <input id="hide_price" name="hide_price" type="checkbox" value="1" {{ (isset($data->hide_price) && $data->hide_price == 1)? 'checked' : ''   }}>
                                                <label for="hide_price" class="text-bold">Ẩn giá quảng cáo</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-offset-1">
                                        <div class="form-group">
                                            <div class="checkbox checkbox-success checkbox-inline">
                                                <input id="map_listings" name="map_listings" type="checkbox" value="1" {{ (isset($data->map_listings) && $data->map_listings == 1)? 'checked' : ''   }}>
                                                <label for="map_listings" class="text-bold">Bản đồ</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-offset-1">
                                        <div class="form-group">
                                            <div class="checkbox checkbox-success checkbox-inline">
                                                <input id="translate" name="translate" type="checkbox" value="1" {{ (isset($data->translate) && $data->translate == 1)? 'checked' : ''   }}>
                                                <label for="translate" class="text-bold">Thông dịch</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-offset-1">
                                        <div class="form-group">
                                            <div class="checkbox checkbox-success checkbox-inline">
                                                <input id="live_chat" name="live_chat" type="checkbox" value="1" {{ (isset($data->live_chat) && $data->live_chat == 1)? 'checked' : ''   }}>
                                                <label for="live_chat" class="text-bold">Chat trực tuyến</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-offset-1">
                                        <div class="form-group">
                                            <div class="checkbox checkbox-success checkbox-inline">
                                                <input id="mobile_verify" name="mobile_verify" type="checkbox" value="1" {{ (isset($data->mobile_verify) && $data->mobile_verify == 1)? 'checked' : ''   }}>
                                                <label for="mobile_verify" class="text-bold">Xác minh bằng điện thoại di động</label>
                                            </div>
                                            @if(isset($data->mobile_verify) && $data->mobile_verify == 1)
                                            <a href="{{ Route('mobile_verify.index') }}" class="btn btn-primary btn-sm"> cài đặt api xác minh bằng di động </a>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group account-btn m-t-10">
                                        <label class=" control-label"></label>
                                        <div class="col-xs-10">
                                            <button class="btn w-md btn-bordered btn-info waves-effect waves-light pull-right" type="submit" >Lưu</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function() {

        $('#social_links').click(function () {
            if ($('#social_links').is(":checked")) {
                $('.social_link').removeClass('hidden');
                console.log('ok');
            } else {
                $('.social_link').addClass('hidden');
            }
        });


        // color picker
        $('.colorpicker-default').colorpicker({
            format: 'hex'
        });

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
            readURL(this, 'preview_profile');
        });
    });

</script>

@endsection
