@extends('layouts.app')

@section('template_title')
    {{ $passwork->name ?? "{{ __('Show') Passwork" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Passwork</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('passworks.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Passgroup Id:</strong>
                            {{ $passwork->passgroup_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $passwork->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $passwork->name }}
                        </div>
                        <div class="form-group">
                            <strong>User Pass:</strong>
                            {{ $passwork->user_pass }}
                        </div>
                        <div class="form-group">
                            <strong>Email Pass:</strong>
                            {{ $passwork->email_pass }}
                        </div>
                        <div class="form-group">
                            <strong>Password Pass:</strong>
                            {{ $passwork->password_pass }}
                        </div>
                        <div class="form-group">
                            <strong>Link:</strong>
                            {{ $passwork->link }}
                        </div>
                        <div class="form-group">
                            <strong>Note:</strong>
                            {{ $passwork->note }}
                        </div>
                        <div class="form-group">
                            <strong>Url Img:</strong>
                            {{ $passwork->url_img }}
                        </div>
                        <div class="form-group">
                            <strong>Favourite:</strong>
                            {{ $passwork->favourite }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
