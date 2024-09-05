@extends('layouts.app')

@section('template_title')
Passwork
@endsection

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-6 d-flex align-items-center">
            <form method="GET" role="form" class="w-100">
                <div class="input-group">
                    <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Buscar..." class="form-control">
                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="{{ route('passworks.create') }}" class="btn btn-primary btn-lg">
                {{ __('Crear nueva') }}
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>{{ __('Nombre') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Acciones') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($passworks as $passwork)
                <tr>
                    <td>{{ $passwork->name }}</td>
                    <td>{{ $passwork->email_pass }}</td>
                    <td class="text-end">
                        <a class="btn btn-primary btn-sm rounded-pill" href="{{ route('passworks.show',$passwork->id) }}">
                            {{ __('Ver') }}
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {!! $passworks->links() !!}
    </div>

</div>

<livewire:password-generator />
@livewireScripts
@endsection
