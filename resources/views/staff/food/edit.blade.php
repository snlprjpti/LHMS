<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Edit</h3>
    </div>
    <div class="box-body">
        {!! Form::model($edits,['method'=>'PUT','route'=>['food.update',$edits->id]]) !!}
        <div class="form-group {{ ($errors->has('category_id'))?'has-error':'' }}">
            <label>Category</label>
            {{Form::select('category_id',$categories->pluck('name','id'),Request::get('category_id'),['class'=>'form-control','placeholder'=>
            'Select Category'])}}
            {!! $errors->first('category_id', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
            <label>Item Name
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('name',null,['class'=>'form-control','placeholder' => 'Item Name']) !!}
            {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="form-group {{ ($errors->has('price'))?'has-error':'' }}">
            <label>Price
                <label class="text-danger"> *</label>
            </label>
            {!! Form::number('price',null,['class'=>'form-control','placeholder' => 'Price']) !!}
            {!! $errors->first('price', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group ">
            <label>Description</label>
            {{ Form::textarea('description', null, ['class' => 'form-control','name'=>'description']) }}
        </div>

        <div class="form-group {{ ($errors->has('allow_today'))?'has-error':'' }}">
            <label for="allow_today">Available ?</label><br>
            {{Form::radio('allow_today', 'yes',null,['class'=>'flat-red'])}} Yes &nbsp;&nbsp;&nbsp;
            {{Form::radio('allow_today', 'no',true,['class'=>'flat-red'])}} No
            {!! $errors->first('allow_today', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="box-footer">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
