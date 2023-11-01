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
                                                <button class="btn btn-outline-secondary"  type="submit"><i class="bi bi-search"></i></button>
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

 

        <div class="container" style="margin-top: 30px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('passwork.generate') }}" method="POST" role="form" enctype="multipart/form-data">
                                @csrf
                                <h2>Personalice su contraseña</h2>
                                <div class="form-group">
                                    <label for="length" class="mb-0">Longitud de la contraseña</label>
                                    <div class="input-group">
                                        <input value="12" name="length" class="lp-custom-range__number" step="1" id="length" type="number" min="1" max="50">
                                        <input type="range" class="lp-custom-form-range" id="passwordLength" name="passwordLength" min="1" max="50" step="1" value="12">
                                    </div>
                                </div>
                            
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" id="useUppercase" name="useUppercase" class="form-check-input" checked>
                                            <label class="form-check-label">Mayúsculas</label>
                                        </div>
                                
                                        <div class="form-check">
                                            <input type="checkbox" id="useLowercase" name="useLowercase" class="form-check-input" checked>
                                            <label class="form-check-label">Minúsculas</label>
                                        </div>
                                
                                        <div class="form-check">
                                            <input type="checkbox" id="useNumbers" name="useNumbers" class="form-check-input" checked>
                                            <label class="form-check-label">Números</label>
                                        </div>
                                
                                        <div class="form-check">
                                            <input type="checkbox" id="useSymbols" name="useSymbols" class="form-check-input" checked>
                                            <label class="form-check-label">Símbolos</label>
                                        </div>
                                    </div>                                
                            
                                <div class="input-group">
                                    @if(isset($password))
                                        <input type="text" class="form-control" aria-label="Recipient's username" value="{{ $password }}" aria-describedby="basic-addon2">
                                    @endif
                                    <button class="btn btn-outline-secondary" type="button" id="copy_password"><i class="bi bi-copy"></i></button>
                                    <button class="btn btn-outline-secondary" type="submit" id="generate_password"><i class="bi bi-arrow-repeat"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    <div class="d-flex justify-content-center" style="margin-top: 30px">{!! $passworks->links() !!}</div>

@endsection