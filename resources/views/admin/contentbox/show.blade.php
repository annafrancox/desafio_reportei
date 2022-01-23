@extends('admin.layouts.app')

@section('content')
    @component('admin.components.show')
        @slot('title',  $contentbox->title)
        @slot('body')

            @foreach($contentbox->attachments as $attachment)
                <div class="alignrow">
                    <div class="card card-attachment">
                        @if(pathinfo( $attachment->file_name, PATHINFO_EXTENSION) == 'pdf')
                            <div class="iconcard">
                                <img src="{{ asset('storage/file/file-pdf-solid.svg')}}" class="card-img-top" style="max-width: 100px; max-height: 100px" alt="...">
                            </div>
                        @else
                            @if(pathinfo( $attachment->file_name, PATHINFO_EXTENSION) == 'mp4' || pathinfo( $attachment->file_name, PATHINFO_EXTENSION) == 'mp3')
                                <div class="iconcard">
                                    <img src="{{ asset('storage/video/file-video-solid.svg')}}" class="card-img-top" style="max-width: 100px; max-height: 100px" alt="...">
                                </div>
                            @else
                                <img src="{{ asset('storage/'.$contentbox->id.'/'.$attachment->file_name)}}" class="card-img-top" style="max-width: 200px; max-height: 200px" alt="...">
                            @endif
                        @endif
                        <div class="card-body btndownload">
                            <a href="{{route('download', $attachment)}}" class="btn btn-outline-success"><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach



        @endslot
    @endcomponent
@endsection
