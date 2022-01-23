@extends('admin.layouts.app')

@section('content')
    @component('admin.components.show')
        @slot('title', 'Content Box')
        @slot('body')

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>

                                <p class="card-text"></p>



                        </div>
                    </div>
                </div>


        @endslot
    @endcomponent
@endsection
