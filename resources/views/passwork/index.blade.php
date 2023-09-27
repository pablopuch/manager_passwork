@extends('layouts.app')

@section('template_title')
    Passwork
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Passwork') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('passworks.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                            <table class="table table-dark table-hover">
                                <thead class="thead">
                                    <tr>                                        
										{{-- <th>Passgroup</th>
										<th>User</th> --}}
										<th>Name</th>
										<th>User Pass</th>
										<th>Email Pass</th>
										<th>Password Pass</th>
										{{-- <th>Link</th>
										<th>Note</th>
										<th>Url Img</th>
										<th>Favourite</th> --}}

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($passworks as $passwork)
                                        <tr>                                            
											{{-- <td>{{ $passwork->passgroup->name }}</td>
											<td>{{ $passwork->user->name }}</td> --}}
											<td>{{ $passwork->name }}</td>
											<td>{{ $passwork->user_pass }}</td>
											<td>{{ $passwork->email_pass }}</td>
											<td>{{ $passwork->password_pass }}</td>
											{{-- <td>{{ $passwork->link }}</td>
											<td>{{ $passwork->note }}</td>
											<td>{{ $passwork->url_img }}</td>
											<td>{{ $passwork->favourite }}</td> --}}

                                            <td>
                                                <form action="{{ route('passworks.destroy',$passwork->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('passworks.show',$passwork->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('passworks.edit',$passwork->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $passworks->links() !!}
            </div>
        </div>
    </div>
@endsection
