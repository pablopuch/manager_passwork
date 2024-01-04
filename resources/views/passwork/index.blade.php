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
                            <a href="{{ route('passwork.pdf') }}" class="btn btn-outline-secondary float-right" data-placement="left">
                                <i class="bi bi-file-earmark-arrow-down"> Descarga PDF</i>
                            </a>
                        </div>

                        <div class="float-right">
                            <a href="{{ route('passworks.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Crear nueva') }}
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
                                <td>{{ $passwork->name }}</td>
                                <td>{{ $passwork->email_pass }}</td>
                                <td>
                                    <form action="{{ route('passworks.destroy',$passwork->id) }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('passworks.show',$passwork->id) }}">{{ __('Ver') }}</a>
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