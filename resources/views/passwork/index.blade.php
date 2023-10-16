@extends('layouts.app')

@section('template_title')
    Passwork
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Passwork') }}
                            </span>

                                <div class="float-center">
                                    <form method="GET" role="form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search" value="{{ request()->get('search') }}" placeholder="Buscar..." style="margin-right: 10px"/>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary float-right">Buscar</button>
                                            </div>
                                        </div>
                                    </form>
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
                                            {{-- <td>{{ $passwork->url_img }}</td> --}}
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

    {{-- Quiero crear un generador de contraseñas en en laravel 10, 
    con un pequeño formulario donde el usurario pueda decir si 
    quiere letras, numero, símbolos y la cantidad de caracteres --}}

        <div class="container" style="margin-top: 10px">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ url('/generar-contrasena') }}">
                                @csrf

                                <h2>Personalice su contraseña</h2>


                                <div class="form-group">
                                    <label for="length">Longitud de la contraseña</label>
                                    <br>
                                    <input value="12" name="length" class="lp-custom-range__number" step="1" id="length" type="number" min="4" max="50">
                                    <input type="range" class="lp-custom-form-range" id="passwordLength" name="passwordLength" min="4" max="50" step="1" value="12">
                                </div>
                                <div class="form-group">

                                    <div class="form-check">
                                        <input type="checkbox" id="use_letters" name="use_letters" class="form-check-input" checked>
                                        <label class="form-check-label" for="use_letters">Mayúsculas</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="use_letters" name="use_letters" class="form-check-input" checked>
                                        <label class="form-check-label" for="use_letters">Minúsculas</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="use_numbers" name="use_numbers" class="form-check-input" checked>
                                        <label class="form-check-label" for="use_numbers">Números</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="use_symbols" name="use_symbols" class="form-check-input" checked>
                                        <label class="form-check-label" for="use_symbols">Símbolos</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="generated_password" name="generated_password" class="form-control" readonly>
                                </div>
                                <button type="button" id="generate_password" class="btn btn-primary" style="margin-top: 10px">Generar Contraseña</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="d-flex justify-content-center" style="margin-top: 30px">{!! $passworks->links() !!}</div>

        </div>
    </div>
@endsection
