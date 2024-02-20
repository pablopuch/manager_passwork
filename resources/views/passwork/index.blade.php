@extends('layouts.app')

@section('template_title')
Passwork
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between;">
                        <div class="">
                            <form method="GET" role="form">
                                <div class="input-group">
                                    {{-- <input type="text" class="form-control" name="search" value="{{ request()->get('search') }}" placeholder="Buscar..." style="margin-right: 10px"/>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-outline-secondary float-right">Buscar</button>
                                    </div> --}}

                                    <div class="input-group">
                                        <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Buscar..." class="form-control">
                                        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="float-right">
                            <a href="{{ route('passworks.create') }}" class="btn btn-primary btn-lg float-right" data-placement="left">
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

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            @foreach ($passworks as $passwork)
                            <tr>
                                <td class="text-left">{{ $passwork->name }}</td>
                                <td class="text-center">{{ $passwork->email_pass }}</td>
                                <td>
                                    <form class="text-end" action="{{ route('passworks.destroy',$passwork->id) }}" method="POST">
                                        <a class="btn btn-primary btn-lg rounded-pill botton-see" href="{{ route('passworks.show',$passwork->id) }}">{{ __('Ver') }}
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<livewire:password-generator />
@livewireScripts


<div class="d-flex justify-content-center" style="margin-top: 30px">{!! $passworks->links() !!}</div>

@endsection