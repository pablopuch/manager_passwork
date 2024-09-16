@extends('layouts.app')

@section('template_title')
Passwork
@endsection

@section('content')
<div class="container">

    <livewire:password-generator />

    <livewire:search-passworks />

</div>




@livewireStyles
@livewireScripts
@endsection