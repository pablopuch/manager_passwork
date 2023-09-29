@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Passwork
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Passwork</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('passworks.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('passworks.update', $passwork->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('passwork.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
