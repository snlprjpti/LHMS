@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                 Orders History
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"> Orders</a></li>
            </ol>
        </section>

        <section class="content">
            @include('flash')
            <div class="row">
                <div class="col-md-12" id="listing">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Orders History</h3>
                        </div>
                        <div class="box-body">
                            <table id="example1"
                                   class="table table-hover table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px;">SN</th>
                                    <th>Employee's Name</th>
                                    <th>Food Items</th>
                                    <th>Date</th>
                                    <th style="width: 10px" ;
                                        class="text-right">Delivery??
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;?>
                                @forelse($orders as $o)
                                    <tr>
                                        <th scope=row>{{$i}}</th>
                                        <td>
                                            <?php $employee = \App\Repository\EmployeeRepo::getName($o->employer_id);
                                            echo $employee->name;
                                            ?>
                                        </td>
                                        <td>
                                            <?php $food = \App\Food::getFoodname($o->food_id);
                                            echo $food->name;
                                            ?>
                                        </td>
                                        <td>{{$o->date}}</td>
                                        <td>
                                            @if($o->delivery == 'yes')
                                                <a class="label label-success stat">
                                                    <strong class="stat"> Yes
                                                    </strong>
                                                </a>
                                            @else
                                                <a class="label label-danger stat">
                                                    <strong class="stat"> No
                                                    </strong>
                                                </a>
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
