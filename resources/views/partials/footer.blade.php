<footer class="main-footer m-t-10">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <!-- page contact -->
                <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="footer-col">
                        <h4 class="footer-title">Về chúng tôi</h4>
                        
                        <ul>
                            @foreach($pages_contact as $item)
                            <li class="footer_page">
                                <span style="color: #fff">- </span><a href="{{ url('page/'.$item->slug) }}">{{ ucfirst($item->title) }}</a>
                                
                            </li>
                            @endforeach
                            <li class="footer_page "><a target="_blank" href="http://gps.tontot.com/" >- gps.tontot.com</a> </li>
                            @if($setting->social_links == 1)
                            @if($setting->facebook !='')
                                <li><a href="{{ $setting->facebook }}" target="_blank"><div class="facebook-hover social-slide imagesize"></div></a></li>
                            @endif
                            @if($setting->twitter !='')
                                <li><a href="{{ $setting->twitter }}" target="_blank"><div class="twitter-hover social-slide imagesize"></div></a></li>
                            @endif
                            @if($setting->googleplus !='')
                                <li><a href="{{ $setting->googleplus }}"><div class="google-hover social-slide imagesize"></div></a></li>
                            @endif
                            @if($setting->linkedin !='')
                                <li><a href="{{ $setting->linkedin }}"><div class="linkedin-hover social-slide imagesize"></div></a><li>
                            @endif
                            @endif
                        </ul>
                       
                    </div>
                </div>
                <!-- page purchase -->
                <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="footer-col">
                        <h4 class="footer-title">Dành cho người mua</h4>
                        
                        <ul>
                            @foreach($pages_purchase as $item)
                            <li class="footer_page">
                                <a href="{{ url('page/'.$item->slug) }}">{{ ucfirst($item->title) }}</a>
                            </li>
                            @endforeach
                        </ul>
                       
                    </div>
                </div>
                <!-- page seller -->
                <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="footer-col">
                        <h4 class="footer-title">Dành cho người bán</h4>
                        
                        <ul>
                            @foreach($pages_seller as $item)
                            <li class="footer_page">
                                <span style="color: #fff">- </span><a href="{{ url('page/'.$item->slug) }}">{{ ucfirst($item->title) }}</a>
                            </li>
                            @endforeach
                        </ul>
                       
                    </div>
                </div>
                <!-- page payment -->
                <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="footer-col">
                        <h4 class="footer-title">Phương thức thanh toán</h4>
                        
                        <ul>
                            {{-- @foreach($pages_seller as $item)
                            <li class="footer_page">
                                <a href="{{ url('page/'.$item->slug) }}">{{ ucfirst($item->title) }}</a>
                            </li>
                            @endforeach --}}
                        </ul>
                       
                    </div>
                </div>

                <div style="clear: both"></div>
                <div class="col-lg-12">
                    <!-- <div class="m-t-20" style="backgroundcopy-info text-center-image: url('{{asset('assets/img/footer_bg.png')}}'); height: 2px"></div> -->
                    <div class=" text-center paymanet-method-logo">
                        <div class="copy-info text-center" style="color: #fff;font-family: 'Roboto', Helvetica, Arial, sans-serif;">
                            {!! (isset($setting->copy_right_text))? $setting->copy_right_text : '' !!}
                        </div>
                       <!--  <p style="color: #fff; font-size: 14px;font-family: 'Roboto', Helvetica, Arial, sans-serif;"> Hotline : <a href="tel:+84797666999">0797 666 999</a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<!-- LOADING  -->
<div style=" top: 0px; bottom: 0px; left: 0px; position: fixed; width: 100%; z-index: 999999; display: none; background: rgba(0,0,0,0.5);" id="loading">
    <div style="margin: 20% 45%; text-align: center;">
        <img src="{!! asset('assets/images/loader1.gif') !!}" alt=""  class="loading"><br />
        <span style="color: mintcream;"> Đang xử lý...</span>
    </div>
</div>
<!-- Sweet-Alert  -->
<script src="{{ asset('assets/plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>

<script src="{{ asset('assets/js/vendors.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<!-- dataTables JS  -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<!-- Toastr js -->
<script src="{{ asset('admin_assets/plugins/toastr/toastr.min.js') }}"></script>

<script src="{{ asset('assets/js/common.js') }}"></script>

@if( !Auth::guest())
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        // check login status
        setInterval(function() {

            $.get('{{ url('login_status') }}', function(data){

            });
            //
        }, 99000);
    </script>

    @if($setting->live_chat!=0)
        @include('chat.test')
    @endif
@endif


@if($setting->translate == 1)
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            //includedLanguages: 'et',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoDisplay: false
        }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

@endif
<!-- <div class="alert-page">
    <span></span>
</div> -->
</body>
</html>