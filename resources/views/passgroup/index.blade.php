@extends('layouts.app')

@section('template_title')
    Passgroup
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Passgroup') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('passgroups.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										{{-- <th>User</th> --}}
										<th>Name</th>
										<th>Url Img</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($passgroups as $passgroup)
                                        <tr>                                            
											{{-- <td>{{ $passgroup->user->name }}</td> --}}
											<td>{{ $passgroup->name }}</td>
											<td>{{ $passgroup->url_img }}</td>

                                            <td>
                                                <form action="{{ route('passgroups.destroy',$passgroup->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('passgroups.show',$passgroup->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('passgroups.edit',$passgroup->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $passgroups->links() !!}
            </div>
        </div>
    </div>
@endsection
