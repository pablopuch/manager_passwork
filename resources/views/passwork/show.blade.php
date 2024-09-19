@extends('layouts.app')

@section('template_title')
{{ $passwork->name ?? __('Show Passwork') }}
@endsection

@section('content')
<section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10 col-sm-12">
            <div class="card shadow-lg border-0 rounded-lg overflow-hidden">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-3">
                    <h2 class="h4 mb-0">{{ $passwork->name }}</h2>
                    <div class="btn-group">
                        <a class="btn btn-outline-light me-2" href="{{ route('passworks.index') }}">
                            <i class="bi bi-arrow-left"></i> {{ __('Volver') }}
                        </a>
                        <a class="btn btn-warning text-white" href="{{ route('passworks.edit', $passwork->id) }}">
                            {{ __('Editar') }} <i class="bi bi-pencil"></i>
                        </a>
                    </div>
                </div>

                <div class="card-body bg-light p-4">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle">
                            <thead>
                                <tr class="text-center text-muted">
                                    <th>{{ __('Usuario') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Contraseña') }}</th>
                                    @if($passwork->link)
                                    <th>{{ __('URL') }}</th>
                                    @endif
                                    @if(!empty($passgroupName))
                                    <th>{{ __('Grupo') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    @foreach(['user_pass', 'email_pass', 'password_pass'] as $field)
                                    <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control border-0 bg-white shadow-sm" id="{{ $field }}" value="{{ $passwork->$field }}" readonly>
                                            <button class="btn btn-outline-secondary shadow-sm" type="button" onclick="copy_clipboard('{{ $field }}')">
                                                <i class="bi bi-clipboard"></i>
                                            </button>
                                        </div>
                                    </td>
                                    @endforeach

                                    @if($passwork->link)
                                    <td>
                                        <a class="btn btn-link text-primary" target="_blank" href="{{ $passwork->link }}">{{ __('Abrir Link') }}</a>
                                    </td>
                                    @endif

                                    @if(!empty($passgroupName))
                                    <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control border-0 bg-white shadow-sm" id="passgroup_name" value="{{ $passgroupName }}" readonly>
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="card-footer bg-dark text-white text-center py-3">
                    <small>{{ __('Detalles mostrados con un diseño moderno y funcional.') }}</small>
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
            navigator.clipboard.writeText(campo.value).then(function() {
                console.log('Texto copiado al portapapeles.');
            }).catch(function(err) {
                console.error('Error al copiar el texto: ', err);
            });
        } else {
            campo.select();
            campo.setSelectionRange(0, 99999); // Para dispositivos móviles
            document.execCommand('copy');
        }
    }
</script>