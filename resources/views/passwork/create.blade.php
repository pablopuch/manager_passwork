@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Passwork
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="float-left">
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('passworks.index') }}"><i class="bi bi-arrow-left"></i> {{ __('Back') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('passworks.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('passwork.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
