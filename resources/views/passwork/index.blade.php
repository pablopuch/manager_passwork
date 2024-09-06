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
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>{{ __('Nombre') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th class="text-center">{{ __('Acciones') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($passworks as $passwork)
                <tr>
                    <td>{{ $passwork->name }}</td>
                    <td>{{ $passwork->email_pass }}</td>
                    <td class="text-center d-flex justify-content-evenly">
                        <a class="btn btn-primary btn-md rounded-pill " href="{{ route('passworks.show',$passwork->id) }}">
                            {{ __('Ver') }}
                            <i class="far fa-eye"></i>
                        </a>
                        <a class="btn btn-warning btn-md rounded-pill" href="{{ route('passworks.edit',$passwork->id) }}">
                            {{ __('Editar') }}
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('passworks.destroy', $passwork->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-md rounded-pill">
                                {{ __('Borrar') }}
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
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


