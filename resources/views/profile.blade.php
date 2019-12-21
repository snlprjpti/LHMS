@extends('admin.layouts.app')
@section('title','User-Profile')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Profile
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">User</a></li>
                <li class="active">Profile</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            @include('flash')
            <div class="box box-danger">
                <div class="box-header with-border">
                    <a href="{{URL::previous()}}" class="pull-right" data-toggle="tooltip" title="Go Back">
                        <i class="fa fa-arrow-circle-left fa-2x"></i></a>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Profile Image -->
                            <div class="box box-primary">
                                <div class="box-body box-profile">
                                    <a data-toggle="modal" data-target="#myModal">

                                            <img class="profile-user-img img-responsive img-circle"
                                                 src="{{url('/uploads/user.gif')}}"
                                                 alt="User Image">
                                    </a>
                                    <!-- Modal -->
                                    <h3 class="profile-username text-center" > {{Auth::user()->name}}
                                    </h3>
                                    <p class="text-muted text-center"><i class="fa fa-address-card" aria-hidden="true"></i> {{Auth::user()->email}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li id="settings_li" class="active">
                                        <a href="#settings" data-toggle="tab" id="setting_tab">Settings</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="settings">
                                        <form id="myform" class="form-horizontal" action="{{url('/profile/password')}}" method="post">
                                            <div class="form-group {{ ($errors->has('old'))?'has-error':''}}">

                                                <label for="old" class="col-sm-3 control-label">Old password</label>
                                                <div class="col-sm-6">
                                                    <input type="password" name="old" class="form-control" id="old"
                                                           placeholder="Enter old password">
                                                    {!! $errors->first('old', '<span class="text-danger">:message</span>') !!}

                                                </div>
                                            </div>
                                            <div class="form-group {{ ($errors->has('password'))?'has-error':''}}">
                                                <label for="new" class="col-sm-3 control-label">New password</label>

                                                <div class="col-sm-6">
                                                    <input name="password" type="password" class="form-control" id="new"
                                                           placeholder="Enter new Password">
                                                    {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="confirm" class="col-sm-3 control-label">Confirm password</label>

                                                <div class="col-sm-6">
                                                    <input name="password_confirmation" type="password" class="form-control" id="confirm"
                                                           placeholder="Confirm Password">
                                                </div>
                                            </div>
                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
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
        </section>
    </div>
@endsection
