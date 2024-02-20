@extends('layouts.app')

@section('template_title')
{{ $passwork->name ?? "{{ __('Show') Passwork" }}
@endsection

@section('content')
<section class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                    </div>
                    <div class="float-right">
                        <form action="{{ route('passworks.destroy',$passwork->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('passworks.index') }}"><i class="bi bi-arrow-left"></i> {{ __('Back') }}</a>
                            <a class="btn btn-success" href="{{ route('passworks.edit',$passwork->id) }}"><i class="bi bi-pencil-square"></i> {{ __('Edit') }}</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> {{ __('Delete') }}</button>
                        </form>
                        <h2>{{ $passwork->name }}</h2>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead">
                            <tr>
                                <th><strong>User Pass</strong></th>
                                <th><strong>Email Pass</strong></th>
                                <th><strong>Password Pass</strong></th>
                                <th><strong>URL</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{  $passwork->user_pass }}">
                                        <button class="btn btn-outline-secondary" type="button" id="copy_password" onclick="copyToClipboard('{{ $passwork->user_pass }}')">
                                            <i class="bi bi-copy"></i></button>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="{{ $passwork->email_pass }}" value="{{ $passwork->email_pass }}">
                                        <button class="btn btn-outline-secondary" type="button" id="copy_password" onclick="copyToClipboard('{{ $passwork->email_pass }}')">
                                            <i class="bi bi-copy"></i></button>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="{{ $passwork->password_pass }}" value="{{ $passwork->password_pass }}">
                                        <button class="btn btn-outline-secondary" type="button" id="copy_password" onclick="copyToClipboard('{{ $passwork->password_pass }}')">
                                            <i class="bi bi-copy"></i></button>
                                    </div>
                                </td>
                                <td><a class="link-opacity-10" target="_blank" href="{{ $passwork->link }}">Ver link</a></td>
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
        inputElement.select();
        document.execCommand('copy');
    }
</script>