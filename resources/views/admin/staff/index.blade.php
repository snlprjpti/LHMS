@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Staff
            </h1>
            <ol class="breadcrumb">
                <li><a href=""> Home</a></li>
                <li class="active">Staffs</li>
            </ol>
        </section>
    <!-- Main content -->
        <section class="content">
            @include('flash')

            <div class="row">
                            <div class="col-md-9">
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Staff List</h3>
                                    </div>
                                    <div class="box-body">
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>S.N</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th style="width: 70px;" class="text-right">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $i = 1;
                                                    ?>
                                                    @forelse($staffs as $s)
                                                        <tr>
                                                            <th scope=row>{{$i++}}</th>
                                                            <td>{{$s->name}}</td>
                                                            <td>{{$s->email}}</td>
                                                            <td class="text-right">
                                                                    <a href="{{route('staff.edit',[$s->id])}}"
                                                                       class="btn btn-info btn-sm"
                                                                       data-toggle="tooltip"
                                                                       data-placement="top" title="Edit">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>

                                                                    {!! Form::open(['method' => 'DELETE', 'class'=>'inline', 'route'=>['staff.destroy',
                                                                        $s->id]]) !!}
                                                                    <button type="submit"
                                                                            class="btn btn-danger btn-sm"
                                                                            data-toggle="tooltip"
                                                                            data-placement="top" title="Delete"
                                                                            onclick="javascript:return confirm('Are you sure you want to delete?');">
                                                                        <i class="fa fa-trash-o"></i>
                                                                    </button>
                                                                {!! Form::close() !!}
                                                            </td>
                                                        </tr>
                                                        @empty
                                                    @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                @if(\Request::segment(3)=='edit')
                                    @include('admin.staff.edit')
                                @else
                                    @include('admin.staff.add')
                                @endif
                            </div>
                    </div>
        </section>
    </div>
@endsection
