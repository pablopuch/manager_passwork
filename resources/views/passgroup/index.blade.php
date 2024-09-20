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
                    <div class="card mb-4 draggable">
                        <div class="card-body p-3" data-href="{{ route('passgroups.show', $passgroup->id) }}" onclick="navigateToCard(this)">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize text-dark font-weight-bold">{{ $passgroup->name }}</p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-primary shadow text-center border-radius-md ms-auto">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center pb-1">
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
</style>

<script>
    function navigateToCard(cardElement) {
        var url = cardElement.getAttribute('data-href');
        window.location.href = url;
    }
</script>
@endsection