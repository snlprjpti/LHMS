@extends('layouts.app')

@section('content')
        @if (Session::has('warning'))
            <div class="alert alert-warning">
                <i class="fa fa-check" aria-hidden="true"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('warning') }}
            </div>
        @endif
    <form method="POST" action="{{url('employee/login')}}">
        {{ csrf_field() }}
        <div class="form-group input-group has-feedback">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="Login Email Address" autofocus>
        </div>
        @if ($errors->has('email'))
            <span class="help-block" style="color: red;">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
        @endif
        <div class="form-group input-group has-feedback">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="password" id="password-field" name="password" class="form-control"
                   placeholder="Password">
        </div>
        @if ($errors->has('password'))
            <span class="help-block" style="color: red;">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
        @endif
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        Remember Me
                    </label>
                </div>
            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" value="signIn">Sign In</button>
            </div>
        </div>
    </form>
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-6">
            <a href="{{ route('employee.password.request') }}">Forgot Password ?</a><br>
        </div>

        <div class="col-md-6">
            <a href="{{ url('employee/register') }}"  class="btn btn-default btn-block btn-flat">Create New</a><br>
        </div>
    </div>
@endsection
