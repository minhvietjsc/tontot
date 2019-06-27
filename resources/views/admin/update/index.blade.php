@extends('admin.layout.app')
@section('content')

<?php
$setting = DB::table('setting')->first();
$ver = \Session::get('up_version');
?>
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Dashboard</h4>
                            <ol class="breadcrumb p-0 m-0">
                                <li><a href="{{ url('dashboard') }}">Dashboard</a> </li>
                                <li class="active"> Cập nhật phiên bản</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">

                    <div class="col-md-12 col-xs-12 col-xxs-12">
                        <div class="panel panel-color panel-inverse">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cập nhật phiên bản</h3>
                            </div>
                            <div class="panel-body">
                                <button class="btn btn-info pull-right"> Phiên bản  <?php //$ver = \Session::get('up_version'); //echo $ver->version;  ?> &nbsp;  <span class="badge badge-danger pull-right"> New</span></button>
                                <button class="btn btn-default pull-right">Phiên bản hiện tại {{ $setting->version }} </button>
                                <div class="clearfix"></div>
                                <h3> Có gì mới trong phiên bản <span class="label label-success">{{ $ver->version }} </span> </h3>
                                <?php
                                if($ver->version != $setting->version ) {
                                
                                  if(count($ver->updates)>0) {
                                    foreach($ver->updates as $update) {
                                        ?>
                                            <p>{!! $update !!}</p>
                                        <?php
                                    }
                                  }
                                }
                                ?>
                                <div class="col-md-offset-5 clearfix m-t-30">

                                    <a href="javascript:void(0)" onclick="updateVersion()" class="btn btn-primary btn-lg">Cập nhật lên {{ $ver->version }}</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- container -->
        </div> <!-- content -->
        <script>
            function updateVersion(){
                $('#loading').show();
                $.get('{{ url('updates') }}', function(data){
                    if(data.success == 1){
                        swal('Success', 'Application updated successfully!', 'success');
                        window.location.href='{{ url('dashboard') }}';
                    }
                    $('#loading').hide();
                });
            }
        </script>
@endsection