@extends('layouts.app')

@section('template_title')
{{ __('Create') }} Passwork
@endsection

@section('content')
<section class="container">
    <div class="row justify-content-center">
        <!-- Columna para el formulario, alineado a la izquierda -->
        <div class="col-md-10 col-lg-10">
            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <div class="float-right text-end">
                        <a class="btn btn-primary" href="{{ route('passworks.index') }}">
                            <i class="bi bi-arrow-left"></i> {{ __('Back') }}
                        </a>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="POST" action="{{ route('passworks.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('passwork.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<livewire:password-generator />
@livewireScripts

@endsection