@extends('layouts.app')
@section('title', 'Đặt hàng thành công')
@section('content')
<div class="container m-t-30">
    <div class="row">
        @if (\Session::has('success'))
            <div class="alert alert-success text-center">
                {{ \Session::get('success') }}
            </div>
        @endif
    </div>
</div>
@endsection
