<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Add</h3>
    </div>
    <div class="box-body">
    {!! Form::open(['method'=>'post','url'=>'staff/category']) !!}
        <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
            <label>Category Name
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('name',null,['class'=>'form-control','placeholder' => 'Category Name']) !!}
            {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="box-footer">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
