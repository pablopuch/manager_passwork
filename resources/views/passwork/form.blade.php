<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group" style="display: none;">
            {{ Form::label('passgroup_id') }}
            {{ Form::select('passgroup_id', $passgroups, $passwork->passgroup_id, ['class' => 'form-control' . ($errors->has('passgroup_id') ? ' is-invalid' : ''), 'placeholder' => 'Passgroup Id']) }}
            {!! $errors->first('passgroup_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group" style="display: none;">
            {{ Form::text('user_id', Auth::user()->id) }}
        </div>



        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $passwork->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_pass') }}
            {{ Form::text('user_pass', $passwork->user_pass, ['class' => 'form-control' . ($errors->has('user_pass') ? ' is-invalid' : ''), 'placeholder' => 'User Pass']) }}
            {!! $errors->first('user_pass', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email_pass') }}
            {{ Form::text('email_pass', $passwork->email_pass, ['class' => 'form-control' . ($errors->has('email_pass') ? ' is-invalid' : ''), 'placeholder' => 'Email Pass']) }}
            {!! $errors->first('email_pass', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('password_pass') }}
            {{ Form::text('password_pass', $passwork->password_pass, ['class' => 'form-control' . ($errors->has('password_pass') ? ' is-invalid' : ''), 'placeholder' => 'Password Pass']) }}
            {!! $errors->first('password_pass', '<div class="invalid-feedback">:message</div>') !!}
        </div>



        <div class="form-group">
            {{ Form::label('link') }}
            {{ Form::text('link', $passwork->link, ['class' => 'form-control' . ($errors->has('link') ? ' is-invalid' : ''), 'placeholder' => 'Link']) }}
            {!! $errors->first('link', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="display: none;">
            {{ Form::label('note') }}
            {{ Form::text('note', $passwork->note, ['class' => 'form-control' . ($errors->has('note') ? ' is-invalid' : ''), 'placeholder' => 'Note']) }}
            {!! $errors->first('note', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="display: none;">
            {{ Form::label('url_img') }}
            {{ Form::text('url_img', $passwork->url_img, ['class' => 'form-control' . ($errors->has('url_img') ? ' is-invalid' : ''), 'placeholder' => 'Url Img']) }}
            {!! $errors->first('url_img', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="display: none;">
            {{ Form::label('favourite') }}
            {{ Form::text('favourite', $passwork->favourite, ['class' => 'form-control' . ($errors->has('favourite') ? ' is-invalid' : ''), 'placeholder' => 'Favourite']) }}
            {!! $errors->first('favourite', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">{{ __('Submit') }}</button>
    </div>
</div>