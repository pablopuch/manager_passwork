@extends('layouts.app')

@section('template_title')
Passgroup
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">{{ $passgroup->name }}</span>
                        <span class="card-title">{{ $passgroup->id }}</span>

                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('passgroups.index') }}"> {{ __('Back') }}</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>User Id:</strong>
                        {{ $passgroup->user->name }}
                    </div>
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $passgroup->name }}
                    </div>
                    <div class="form-group">
                        <strong>Url Img:</strong>
                        {{ $passgroup->url_img }}
                    </div>

                </div>


                <table class="table table-striped table-hover align-middle mb-5">
                    <thead>
                        <tr>
                            <th class="text-center">{{ __('Nombre') }}</th>
                            <th class="text-center">{{ __('Email') }}</th>
                            <th class="text-center">{{ __('Acciones') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($passworks as $passwork)
                        <tr>
                            <td class="text-center">{{ $passwork->name }}</td>
                            <td class="text-center">{{ $passwork->email_pass }}</td>
                            <td class="text-center">
                                <div class="d-none d-md-flex justify-content-evenly">
                                    <a class="btn btn-primary btn-md" href="{{ route('passworks.show',$passwork->id) }}">
                                        {{ __('Ver') }}
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning btn-md" href="{{ route('passworks.edit',$passwork->id) }}">
                                        {{ __('Editar') }}
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('passworks.destroy', $passwork->id) }}" method="POST" onsubmit="return confirmDelete();">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>

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
                        @empty
                        <tr>
                            <td colspan="3">{{ __('No se encontraron contraseñas.') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>
@endsection