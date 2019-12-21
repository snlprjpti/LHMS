<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Add Staff</h3>

    </div>
    <div class="box-body">
        {!! Form::open(['method'=>'post','url'=>'admin/staff']) !!}

        <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
            <label>Full Name</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Full Name']) !!}
            </div>
            {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="form-group {{ ($errors->has('email'))?'has-error':'' }}">
            <label>Email</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-at"></i></span>
                {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'email@gmail.com']) !!}
            </div>
            {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="box-footer">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
