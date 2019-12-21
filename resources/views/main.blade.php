@extends('layouts.app')
@section('content')
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-info" style="background-color: rgba(255,255,255,0.8); min-height: 310px">

                    <div align="center">
                        <span style="text-align:center;font-weight: bolder; font-size:150px;"><a href="{{url('/login')}}"><i style="color: gray" class="fa fa-user"></i></a></span><br/>
                        <span style="text-align:center;font-weight: bolder; font-size:30px;"> <a href="{{url('/login')}}">Admin</a></span><br/><br/>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="panel panel-info " style="background-color: rgba(255,255,255,0.8); min-height: 310px ">

                    <div align="center">
                        <span style="text-align:center;font-weight: bolder; font-size:150px;"><a href="{{url('/login')}}"><i style="color: gray" class="fa fa-user-secret" aria-hidden="true"></i></a></span><br/>
                        <span style="text-align:center;font-weight: bolder; font-size:30px;"> <a href="{{url('/login')}}">Staff</a></span><br/><br/>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <div class="panel panel-info" style="background-color: rgba(255,255,255,0.8); min-height: 310px ">
                    <div align="center">
                        <br/>
                        <span style="text-align:center;font-weight: bolder; font-size:120px;"><a href="{{url('/employee/login')}}"><i style="color: gray" class="fa fa-users" aria-hidden="true"></i></a></span><br/><br/>
                        <span style="text-align:center;font-weight: bolder; font-size:30px;"><a href="{{url('/employee/login')}}">Employer</a></span><br/><br/>
                    </div>
                </div>
            </div>
        </div>

@endsection
