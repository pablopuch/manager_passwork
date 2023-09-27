<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group" style="display: none;">
            {{ Form::text('user_id', Auth::user()->id) }}
        </div>

        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $passgroup->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('url_img') }}
            {{ Form::text('url_img', $passgroup->url_img, ['class' => 'form-control' . ($errors->has('url_img') ? ' is-invalid' : ''), 'placeholder' => 'Url Img']) }}
            {!! $errors->first('url_img', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>