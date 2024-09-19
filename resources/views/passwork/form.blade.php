<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('passgroup_id') }}
            {{ Form::select('passgroup_id', $passgroups, $passwork->passgroup_id, ['class' => 'form-control' . ($errors->has('passgroup_id') ? ' is-invalid' : ''), 'placeholder' => 'Passgroup Id']) }}
            {!! $errors->first('passgroup_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group" style="display: none;">
            {{ Form::text('user_id', Auth::user()->id) }}
        </div>

        <div class="row g-3">
            <!-- Columna izquierda -->
            <div class="col-md-6">
                <div class="form-group mb-3">
                    {{ Form::label('name', 'Nombre', ['class' => 'form-label']) }}
                    {{ Form::text('name', $passwork->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group mb-3">
                    {{ Form::label('user_pass', 'Usuario', ['class' => 'form-label']) }}
                    {{ Form::text('user_pass', $passwork->user_pass, ['class' => 'form-control' . ($errors->has('user_pass') ? ' is-invalid' : ''), 'placeholder' => 'Ususario']) }}
                    {!! $errors->first('user_pass', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <!-- Columna derecha -->
            <div class="col-md-6">
                <div class="form-group mb-3">
                    {{ Form::label('email_pass', 'Correo', ['class' => 'form-label']) }}
                    {{ Form::text('email_pass', $passwork->email_pass, ['class' => 'form-control' . ($errors->has('email_pass') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                    {!! $errors->first('email_pass', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group mb-3">
                    {{ Form::label('password_pass', 'Contraseña', ['class' => 'form-label']) }}
                    {{ Form::text('password_pass', $passwork->password_pass, ['class' => 'form-control' . ($errors->has('password_pass') ? ' is-invalid' : ''), 'placeholder' => 'Contraseña']) }}
                    {!! $errors->first('password_pass', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('link') }}
            <div class="input-group mb-3">
                <span class="input-group-text" id="btnGroupAddon2">https://</span>
                {{ Form::text('link', $passwork->link, ['class' => 'form-control' . ($errors->has('link') ? ' is-invalid' : ''), 'placeholder' => 'Link', 'aria-describedby' => 'btnGroupAddon2']) }}
                {!! $errors->first('link', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>


        <div class="form-group">
            {{ Form::label('Notas') }}
            {{ Form::text('note', $passwork->note, ['class' => 'form-control' . ($errors->has('note') ? ' is-invalid' : ''), 'placeholder' => 'Notas']) }}
            {!! $errors->first('note', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <!-- <div class="form-group" style="display: none;">
            {{ Form::label('url_img') }}
            {{ Form::text('url_img', $passwork->url_img, ['class' => 'form-control' . ($errors->has('url_img') ? ' is-invalid' : ''), 'placeholder' => 'Url Img']) }}
            {!! $errors->first('url_img', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="display: none;">
            {{ Form::label('favourite') }}
            {{ Form::text('favourite', $passwork->favourite, ['class' => 'form-control' . ($errors->has('favourite') ? ' is-invalid' : ''), 'placeholder' => 'Favourite']) }}
            {!! $errors->first('favourite', '<div class="invalid-feedback">:message</div>') !!}
        </div> -->

    </div>

    <div class="box-footer mt-4 text-center">
        <button type="submit" class="btn btn-primary btn-lg" style="margin-top: 10px; padding: 10px 50px;">
            {{ __('Crear') }}
        </button>
    </div>


</div>