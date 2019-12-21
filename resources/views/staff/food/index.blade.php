@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Food Items
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Food Items</li>
            </ol>
        </section>

        <section class="content">
            @include('flash')
            <div class="row">
                <div class="col-md-9" id="listing">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Food Items</h3>
                        </div>
                        <div class="box-body">
                            <table id="example1"
                                   class="table table-hover table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px;">SN</th>
                                    <th>Category</th>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Available</th>
                                    <th style="width: 10px" ;
                                        class="text-right">Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;?>
                                @forelse($foods as $f)
                                    <tr>
                                        <th scope=row>{{$i}}</th>
                                        <td>{{$f->category->name}}</td>
                                        <td>{{$f->name}}</td>
                                        <td>{{$f->price}}</td>
                                        <td>
                                            @if($f->allow_today == 'yes')
                                                <a class="label label-success stat"
                                                   href="{{url('/staff/food/status/'.$f->id)}}">
                                                    <strong class="stat"> Yes
                                                    </strong>
                                                </a>
                                            @else
                                                <a class="label label-danger stat"
                                                   href="{{url('/staff/food/status/'.$f->id)}}">
                                                    <strong class="stat"> No
                                                    </strong>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{route('food.edit',[$f->id])}}"
                                               class="text-info actionIcon" data-toggle="tooltip"
                                               data-placement="top" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>&nbsp;

                                            {!! Form::open(['method' => 'DELETE', 'route'=>['food.destroy',
                                                $f->id],'class'=> 'inline']) !!}
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
                        @include('staff.food.edit')
                    @else
                        @include('staff.food.add')
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
