@extends('admin.layouts.app')

@section('content')
    @component('admin.components.edit')
        @slot('title', 'Editar Informações da Content Box')
        @slot('url', route('contentbox.update', $contentbox->id))
        @slot('form')
            @include('admin.contentbox.form')
        @endslot
        @slot('files')
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
                            <form class="form-delete" action="{{ route('attachment.destroy', $attachment) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endslot
    @endcomponent
@endsection
