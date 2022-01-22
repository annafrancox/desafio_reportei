@extends('admin.layouts.app')

@section('content')
    @component('admin.components.create')
        @slot('title', 'Cadastre uma Content Box')
        @slot('url', route('contentbox.store'))
        @slot('form')
            @include ('admin.contentbox.form')
        @endslot
    @endcomponent
@endsection
