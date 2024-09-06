@extends('layouts.app')

@section('template_title')
{{ $passwork->name ?? "{{ __('Show') Passwork" }}
@endsection

@section('content')
<section class="container my-4">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>{{ $passwork->name }}</h2>
                    <div class="btn-group">
                        <a class="btn btn-primary" href="{{ route('passworks.index') }}">
                            <i class="bi bi-arrow-left"></i> {{ __('Back') }}
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th><strong>{{ __('User Pass') }}</strong></th>
                                <th><strong>{{ __('Email Pass') }}</strong></th>
                                <th><strong>{{ __('Password Pass') }}</strong></th>
                                <th><strong>{{ __('URL') }}</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="user_pass" value="{{ $passwork->user_pass }}" readonly>
                                        <button class="btn btn-outline-secondary" type="button" onclick="copyToClipboard('user_pass')">
                                            <i class="bi bi-copy"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="email_pass" value="{{ $passwork->email_pass }}" readonly>
                                        <button class="btn btn-outline-secondary" type="button" onclick="copyToClipboard('email_pass')">
                                            <i class="bi bi-copy"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="password_pass" value="{{ $passwork->password_pass }}" readonly>
                                        <button class="btn btn-outline-secondary" type="button" onclick="copyToClipboard('password_pass')">
                                            <i class="bi bi-copy"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-link" target="_blank" href="{{ $passwork->link }}">{{ __('View Link') }}</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<script>
    function copyToClipboard(elementId) {
        var inputElement = document.getElementById(elementId);
        navigator.clipboard.writeText(inputElement.value)
            .then(() => alert('{{ __("Copied to clipboard!") }}'))
            .catch(err => console.error('Error copying text: ', err));
    }
</script>
