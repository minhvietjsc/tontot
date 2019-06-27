@extends('layouts.app')
@section('title', 'Đăng nhập')
@section('content')
<div class="container m-t-30">
    <div class="row">
        <div class="col-md-5 col-md-offset-3 login-box">
            <div class="panel panel-default">
                <div class="text-center pd-tb-10 theme-bg">
                    <center><img src="{{asset('assets/images/logo/'.$setting->logo)}}" alt="" height="60"> </center>
                </div>
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
                <div class="panel-body">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <label for="email" class=" control-label">E-Mail:</label>
                                <div class="input-icon"><i class="icon-user fa"></i>
                                <input id="email" type="email" class="form-control" name="email" @if (session('email')) value="{{ session('email') }}" @else  value="{{ old('email') }}" @endif required autofocus autocomplete="off">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label for="password" class="control-label">Mật khẩu:</label>
                                <div class="input-icon"><i class="icon-lock fa"></i>
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="off">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ghi nhớ đăng nhập
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                                <a class="pull-right" href="{{ route('password.request') }}"> Quên mật khẩu? </a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="footer-fix" style="padding-top: 15%;"></div>





















@endsection
