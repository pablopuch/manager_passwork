@extends('layouts.app')

@section('template_title')
Passgroup
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10">


            <!-- Botón flotante para móviles y botón normal para pantallas grandes -->
            <div class="d-block d-sm-none mb-4">
                <a href="{{ route('passgroups.create') }}" class="btn btn-primary btn-floating">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
            <div class="d-none d-sm-block mb-4">
                <a href="{{ route('passgroups.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> {{ __('Create New') }}
                </a>
            </div>

            <!-- Contenedor de tarjetas para los grupos -->
            <div class="row mt-4">
                @foreach ($passgroups as $passgroup)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card shadow-sm border-0 rounded-lg" data-href="{{ route('passgroups.show', $passgroup->id) }}" onclick="navigateToCard(this)">
                        <div class="card-header bg-primary text-white text-center">
                            <h5 class="mb-0">{{ $passgroup->name }}</h5>
                        </div>
                        <div class="card-body text-center">
                            <!-- Puedes agregar más información del grupo aquí si es necesario -->
                        </div>
                        <div class="card-footer text-center">
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-success me-2" href="{{ route('passgroups.edit', $passgroup->id) }}">
                                    <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                </a>
                                <form action="{{ route('passgroups.destroy', $passgroup->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Paginación -->
            {!! $passgroups->links() !!}
        </div>
    </div>
</div>

<!-- Estilos adicionales para el botón flotante y la tarjeta -->
<style>
    .btn-floating {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
    }

    .card {
        cursor: pointer;
    }

    .card-header,
    .card-footer {
        cursor: pointer;
    }

    .card-footer .btn {
        flex: 1;
        max-width: 100px;
        /* Ajusta el ancho máximo del botón si es necesario */
    }

    .card-footer .btn-success,
    .card-footer .btn-danger {
        width: 100px;
        /* Establece el ancho fijo para los botones */
    }
</style>

<script>
    function navigateToCard(cardElement) {
        var url = cardElement.getAttribute('data-href');
        window.location.href = url;
    }
</script>
@endsection