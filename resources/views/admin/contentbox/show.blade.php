@extends('admin.layouts.app')

@section('content')
    @component('admin.components.show')
        @slot('title',  $contentbox->title)
        @slot('body')

            @foreach($contentbox->attachments as $attachment)
                <div class="col">
                    <div class="card card-attachment">
                        @if(pathinfo( $attachment->file_name, PATHINFO_EXTENSION) == 'pdf')
                            <img src="{{ asset('storage/file/file-pdf-solid.svg')}}" class="card-img-top" style="max-width: 100px; max-height: 100px" alt="...">
                        @else
                            @if(pathinfo( $attachment->file_name, PATHINFO_EXTENSION) == 'mp4')
                                <img src="{{ asset('storage/video/file-video-solid.svg')}}" class="card-img-top" style="max-width: 100px; max-height: 100px" alt="...">
                            @else
                                <img src="{{ asset('storage/'.$contentbox->id.'/'.$attachment->file_name)}}" class="card-img-top" style="max-width: 200px; max-height: 200px" alt="...">
                            @endif
                        @endif
                        <div class="card-body">
                            <a src="{{route('download', $contentbox->id.'/'.$attachment->file_name)}}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach



        @endslot
    @endcomponent
@endsection
