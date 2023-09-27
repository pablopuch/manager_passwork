@extends('layouts.app')

@section('template_title')
    {{ $passgroup->name ?? "{{ __('Show') Passgroup" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Passgroup</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('passgroups.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $passgroup->user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $passgroup->name }}
                        </div>
                        <div class="form-group">
                            <strong>Url Img:</strong>
                            {{ $passgroup->url_img }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
