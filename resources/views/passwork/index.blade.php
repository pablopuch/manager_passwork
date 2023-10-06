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
                                <thead class="thead">
                                    <tr>                                        
										{{-- <th>IMG</th> --}}
                                        <th>Name</th>
										<th>Email Pass</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($passworks as $passwork)
                                        <tr>
                                            {{-- <td>{{ $passwork->url_img }}</td>                                             --}}
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

                        
                            {{-- <div class="container">
                                <div class="jumbotron mt-4 text-center ">
                                    <h1>Create a Password</h1>
                                    
                                    <div class="form-check container mb-2">
                                        <input id="lowercase" type="checkbox" class="form-check-input" checked="true">
                                        <label for="lowercase" class="form-check-label">Mayusculas</label>
                                        <br>
                                        <input id="uppercase" type="checkbox" class="form-check-input" checked="true">
                                        <label for="uppercase" class="form-check-label">Minusculas</label>
                                        <br>
                                        <input id="numbers" type="checkbox" class="form-check-input" checked="true">
                                        <label for="numbers" class="form-check-label">Numeros</label>
                                        <br>
                                        <input id="special" type="checkbox" class="form-check-input" checked="true">
                                        <label for="special" class="form-check-label">Simbolos (!@#$...)</label>
                                        <br>
                                        <input id="len" type="number" name="length" max="20" size="5" value="10" style="width: 100px;">
                                        <label for="len" class="form-number-label" >Password Length</label>  
                                    </div>
                                    
                                    <button id="createPassword" class="btn btn-primary btn-lg col-lg-4 col-md-6 col-sm-8 col-xs-12 mt-4">Generate Password</button>
                                    <h3 id="password"></h3>
                                </div>
                            </div> --}}


                    </div>
                </div>
        </div>
    </div>

            <div class="d-flex justify-content-center" style="margin-top: 10px">{!! $passworks->links() !!}</div>

        </div>
    </div>
@endsection
