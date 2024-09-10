@extends('layouts.app')

@section('template_title')
Passwork
@endsection

@section('content')
<div class="container">


    <livewire:password-generator />

    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10">
            <div class="container mb-4 mt-5">
                <div class="row align-items-center">
                    <!-- Columna de búsqueda -->
                    <div class="col-12 col-md-8 mb-3 mb-md-0">
                        <form method="GET" role="form">
                            <div class="input-group">
                                <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Buscar..." class="form-control">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Columna de creación de nuevo elemento -->
                    <div class="col-12 col-md-4 text-md-end text-center">
                        <a href="{{ route('passworks.create') }}" class="btn btn-primary btn-lg d-none d-md-inline-block">
                            {{ __('Crear') }}
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Botón flotante para móviles -->
            <a href="{{ route('passworks.create') }}" class="btn btn-primary btn-lg d-md-none btn-float">
                <i class="fas fa-plus"></i>
            </a>



            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <div class="row justify-content-center">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-5">
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
                                <td class="text-center">{{ $passwork->name }}</td>
                                <td class="text-center">{{ $passwork->email_pass }}</td>
                                <td class="text-center">
                                    <!-- En pantalla grande, se muestran los botones -->
                                    <div class="d-none d-md-flex justify-content-evenly">
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
                                    </div>

                                    <!-- En pantalla pequeña, se muestra un menú desplegable -->
                                    <div class="d-md-none">
                                        <select class="form-select" onchange="handleActionChange(this, '{{ $passwork->id }}')">
                                            <option value="">{{ __('Acciones') }}</option>
                                            <option value="view">{{ __('Ver') }}</option>
                                            <option value="edit">{{ __('Editar') }}</option>
                                            <option value="delete">{{ __('Borrar') }}</option>
                                        </select>
                                    </div>
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

    <script>
        function handleActionChange(select, id) {
            if (select.value === 'view') {
                window.location.href = `{{ url('passworks') }}/${id}`;
            } else if (select.value === 'edit') {
                window.location.href = `{{ url('passworks') }}/${id}/edit`;
            } else if (select.value === 'delete') {
                if (confirm('{{ __("¿Estás seguro de que deseas eliminar este elemento?") }}')) {
                    let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `{{ url('passworks') }}/${id}`;
                    form.innerHTML = `@csrf @method('DELETE')`;
                    document.body.appendChild(form);
                    form.submit();
                }
            }
            select.value = ''; // Resetear el select
        }
    </script>

    <style>
        .btn-float {
            position: fixed;
            right: 20px;
            bottom: 20px;
            z-index: 1000;
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>

    @livewireScripts
    @endsection