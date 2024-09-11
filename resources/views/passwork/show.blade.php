@extends('layouts.app')

@section('template_title')
{{ $passwork->name ?? __('Show Passwork') }}
@endsection

@section('content')
<section class="container my-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top">
                    <h2 class="h4 mb-0">{{ $passwork->name }}</h2>
                    <div class="btn-group">
                        <a class="btn btn-light text-primary me-2" href="{{ route('passworks.index') }}">
                            <i class="bi bi-arrow-left"></i> {{ __('Volver') }}
                        </a>
                        <a class="btn btn-warning text-white btn-md" href="{{ route('passworks.edit', $passwork->id) }}">
                            {{ __('Editar') }}
                            <i class="bi bi-pencil"></i>
                        </a>
                    </div>
                </div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr class="text-center">
                                    <th>{{ __('Usuario') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Contraseña') }}</th>
                                    @if($passwork->link)
                                    <th>{{ __('URL') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="user_pass" value="{{ $passwork->user_pass }}" readonly>
                                            <button class="btn btn-outline-secondary" type="button" onclick="copy_clipboard('user_pass')">
                                                <i class="bi bi-copy"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="email_pass" value="{{ $passwork->email_pass }}" readonly>
                                            <button class="btn btn-outline-secondary" type="button" onclick="copy_clipboard('email_pass')">
                                                <i class="bi bi-copy"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="password_pass" value="{{ $passwork->password_pass }}" readonly>
                                            <button class="btn btn-outline-secondary" type="button" onclick="copy_clipboard('password_pass')">
                                                <i class="bi bi-copy"></i>
                                            </button>
                                        </div>
                                    </td>
                                    @if($passwork->link)
                                    <td>
                                        <a class="btn btn-link text-decoration-none" target="_blank" href="{{ $passwork->link }}">{{ __('Link') }}</a>
                                    </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

<script>
    function copy_clipboard(id) {
        var campo = document.getElementById(id);

        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(campo.value).then(function() {}).catch(function(err) {
                console.error('Error al copiar el texto: ', err);
            });
        } else {
            campo.select();
            campo.setSelectionRange(0, 99999); // Para dispositivos móviles
            document.execCommand('copy');
        }
    }
</script>