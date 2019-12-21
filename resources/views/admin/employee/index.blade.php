@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Employees
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"><i class="fa fa-users"></i> Employees</a></li>
            </ol>
        </section>

        <section class="content">
            @include('flash')

            <div class="row">

                <div class="col-md-12" id="listing">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Employer List</h3>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-hover table-bordered table-responsive table-striped"
                                   cellpadding="0">
                                <thead>
                                <tr>
                                    <th style="width: 10px;">SN</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;?>
                                @forelse($employees as $e)
                                    <tr>
                                        <th scope=row>{{$i}}</th>
                                        <td>{{$e->name}}</td>
                                        <td>{{$e->designation}}</td>
                                        <td>{{$e->email}}</td>
                                        <td class="text-center">
                                            @if($e->verified == 'yes')
                                                <a href="{{url('admin/employee/status',$e->id)}}"
                                                   class="btn btn-success btn-block btn-flat btn-xs">Active</a>
                                            @else
                                                <a href="{{url('admin/employee/status', $e->id)}}"
                                                   class="btn btn-danger btn-block btn-flat btn-xs">Deactive</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
