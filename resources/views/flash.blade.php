<div class="row">
    <div class="col-md-12">
        @if (Session::has('success'))
            <div class="alert alert-success">
                <i class="fa fa-check" aria-hidden="true"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('success') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">
                <i class="fa fa-times" aria-hidden="true"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('error') }}
            </div>
        @endif

        @if (Session::has('warning'))
            <div class="alert alert-warning">
                <i class="fa fa-warning" aria-hidden="true"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('warning') }}
            </div>
        @endif
    </div>
</div>
