@extends('layouts.app')

@section('template_title')
Passwork
@endsection

@section('content')
<div class="container">


    <livewire:password-generator />

    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10">

            <div class="container text-center mb-4 mt-5">
                <div class="row">
                    <!-- La primera columna ocupa 2/3 del ancho -->
                    <div class="col">
                        <form method="GET" role="form">
                            <div class="input-group">
                                <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Buscar..." class="form-control">
                                <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>

                    <!-- La segunda columna ocupa 1/3 del ancho y el contenido está justificado a la derecha -->
                    <div class="col-md-4 text-end">
                        <a href="{{ route('passworks.create') }}" class="btn btn-primary btn-lg">
                            {{ __('Crear nueva') }}
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>





            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <div class="row justify-content-center">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('Nombre') }}</th>
                                <th class="text-center">{{ __('Email') }}</th>
                                <th class="text-center">{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($passworks as $passwork)
                            <tr>
                                <td>{{ $passwork->name }}</td>
                                <td>{{ $passwork->email_pass }}</td>
                                <td class="text-center d-flex justify-content-evenly">
                                    <a class="btn btn-primary btn-md" href="{{ route('passworks.show',$passwork->id) }}">
                                        {{ __('Ver') }}
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning btn-md" href="{{ route('passworks.edit',$passwork->id) }}">
                                        {{ __('Editar') }}
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('passworks.destroy', $passwork->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-md">
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
            </div>

            <div class="d-flex justify-content-center">
                {!! $passworks->links() !!}
            </div>
        </div>
    </div>

    @livewireScripts
    @endsection