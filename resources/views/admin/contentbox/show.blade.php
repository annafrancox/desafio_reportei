@extends('admin.layouts.app')

@section('content')
    @component('admin.contentbox.show')
        @slot('title', 'Content Box')
        @slot('form')
            @include('admin.contentbox.form')
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $('.form-control' ).attr('readonly',true)
    </script>
@endpush
