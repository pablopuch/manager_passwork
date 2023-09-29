@extends('layouts.app')

@section('template_title')
    Passwork
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Passwork') }}
                            </span>

                                <div class="mb-4" style="max-width: 20rem;">
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

                    <div class="card-body">
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
                    </div>
                </div>
                
                    {{-- @foreach ($passworks as $passwork)
                        <div class="col-2">
                            <div class="card border-primary mb-3 text-center" style="max-width: 20rem;">
                                
                                    <div class="card-body">
                                        <h1 class="card-title">{{ $passwork->name }}</h1>
                                        <form action="{{ route('passworks.destroy',$passwork->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('passworks.show',$passwork->id) }}">{{ __('Show') }}</a>
                                        </form>
                                    </div>
                                
                            </div>
                        </div>
                    @endforeach --}}

                <div style="margin-top: 30px">{!! $passworks->links() !!}</div>

        </div>
    </div>
@endsection
