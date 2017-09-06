@extends('layouts.admin.logon')
@section('title', 'Login')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{url('/')}}">Palma Real</a>
    </div>
    @include('flash::message')
    <div class="login-box-body">
        <p class="login-box-msg">Inicia sesión para poder acceder al panel de administración!!</p>
        <form role="form" method="post" action="{{ route('admin.login') }}">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
