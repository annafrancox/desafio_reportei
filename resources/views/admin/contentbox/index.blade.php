@extends('admin.layouts.app')

@section('content')
    @component('admin.components.cards')
        @slot('title', 'Content Boxes')
        @slot('create', route('contentbox.create'))

        @slot('body')
            @foreach($contentbox as $contentBox)
                <div class="col">
                    <div class="card">
                        <img src="{{ asset($contentBox->imageheader) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $contentBox->title }}</h5>
                            @if($contentBox->description)
                            <p class="card-text">{{ $contentBox->description }}</p>
                            @endif
                            <div class="text-center btn-list">
                                <a href="{{ route( 'contentbox.show', $contentBox->id ) }}" class="btn btn-outline-primary" style="width: 40px"><i class="fas fa-eye"></i></a>
                                <a href="{{ route( 'contentbox.edit', $contentBox->id ) }}" class="btn btn-outline-primary" style="width: 40px"><i class="fas fa-pen"></i></a>
                                <form class="form-delete pl-2" action="{{ route('contentbox.destroy', $contentBox->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        @endslot
    @endcomponent
@endsection
