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
                                        <td>{{ $passwork->user_pass }}</td>
										<td>{{ $passwork->email_pass }}</td>
                                        <td>{{ $passwork->password_pass }}</td>
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
