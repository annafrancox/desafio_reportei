@extends('admin.layouts.app')

@section('content')
    @component('admin.components.edit')
        @slot('title', 'Editar Informações da Content Box')
        @slot('url', route('contentbox.update', $contentbox->id))
        @slot('form')
            @include('admin.contentbox.form')
        @endslot
    @endcomponent
@endsection
