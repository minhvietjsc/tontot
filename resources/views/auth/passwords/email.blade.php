@extends('layouts.app')

@section('content')


<div class="container m-t-30">

    <div class="row">

        <div class="col-md-5 col-md-offset-3 login-box">

            <div class="panel panel-default">

                <div class="text-center">

                    <h2 class="logo-title">

                        <span class="logo-icon"><img src="{{asset('assets/images/logo/'.$setting->logo)}}" alt="" height="60"> </span>

                    </h2>

                </div>

                <hr>

                <div class="panel-body">

                    @if (session('status'))

                        <div class="alert alert-success">

                            {{ session('status') }}

                        </div>

                    @endif



                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}" autocomplete="off">

                        {{ csrf_field() }}



                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-12">

                                <label for="email" class="control-label">E-Mail:</label>

                                <div class="input-icon"><i class="icon-mail fa"></i>

                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                </div>

                                @if ($errors->has('email'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('email') }}</strong>

                                    </span>

                                @endif

                            </div>

                        </div>



                        <div class="form-group">

                            <div class="col-md-12">

                                <button type="submit" class="btn btn-primary btn-block">

                                    Gửi liên kết(link) đặt lại mật khẩu

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

