@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
            Categories
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Categories</li>
            </ol>
        </section>

        <section class="content">
            @include('flash')
            <div class="row">
                <div class="col-md-9" id="listing">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Categories</h3>
                        </div>
                        <div class="box-body">
                            <table id="example1"
                                   class="table table-hover table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px;">SN</th>
                                    <th>Categories</th>
                                    <th style="width: 10px" ;
                                        class="text-right">Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;?>
                                @forelse($categories as $cat)
                                    <tr>
                                        <th scope=row>{{$i}}</th>
                                        <td>{{$cat->name}}</td>
                                        <td class="text-right">
                                                <a href="{{route('category.edit',[$cat->id])}}"
                                                   class="text-info actionIcon" data-toggle="tooltip"
                                                   data-placement="top" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>&nbsp;

                                                {!! Form::open(['method' => 'DELETE', 'route'=>['category.destroy',
                                                    $cat->id],'class'=> 'inline']) !!}
                                                <button type="submit"
                                                        class="btn btn-default btn-xs deleteButton actionIcon"
                                                        data-toggle="tooltip"
                                                        data-placement="top" title="Delete"
                                                        onclick="javascript:return confirm('Are you sure you want to delete?');">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                                {!! Form::close() !!}
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

                <div class="col-md-3">
                    @if(\Request::segment(4)=='edit')
                        @include('staff.category.edit')
                    @else
                        @include('staff.category.add')
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
