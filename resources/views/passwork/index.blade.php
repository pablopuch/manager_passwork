@extends('layouts.app')

@section('template_title')
Passwork
@endsection

@section('content')
<div class="container">

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <livewire:password-generator />
    
    <livewire:search-passworks />

</div>


@livewireScripts
@endsection