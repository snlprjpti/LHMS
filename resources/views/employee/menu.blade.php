@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Home
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            </ol>
        </section>

        <section class="content">
            @include('flash')
            <div class="row">
                <div class="col-md-12" id="listing">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Menu</h3>
                        </div>
                        <div class="box-body">

                            {!! Form::open(['method'=>'post','url'=>'employee/orderItem'], 'multiple') !!}
                            <table id="example1"
                                   class="table table-hover table-responsive table-bordered table-striped">
                                <?php $i = 1;?>
                                @forelse($categories as $c)
                                    <tr>
                                        <th>{{$c->name}}</th>
                                    </tr>
                                    <?php $food = \App\Repository\EmployeeRepo::getFoodByCategoryId($c->id);?>
                                    <tr>
                                        <td>Item Name</td>
                                        <td>Price</td>
                                        <td style="width: 10px" ;
                                            class="text-right">Action
                                        </td>
                                    </tr>

                                    @forelse($food as $f)
                                        <tr>
                                            <td>{{$f->name}}</td>
                                            <td>{{$f->price}}</td>
                                            <td><input type="checkbox" name="foodItem[]" value="{{$f->id}}"></td>
                                        </tr>
                                    @empty
                                    @endforelse
                                @empty
                                @endforelse
                            </table>

                            <button type="submit"
                                        class="btn btn-default actionIcon" style="float: right">
                                    Submit
                                </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
