@extends('admin.layouts.app')

@section('content')
    @component('admin.components.table')
        @slot('title', 'Content Boxes')
        @slot('create', route('contentbox.create'))
        @slot('head')
            <td>Titulo</td>
            <td></td>
        @endslot
        @slot('body')
            @foreach($contentbox as $contentBox)
                <tr>
                    <td>{{ $contentBox->title }}</td>

                    <td>
                        <div class="text-center btn-list">
                            <a href="{{ route( 'contentbox.show', $contentBox->id ) }}" class="btn btn-outline-success" style="width: 40px"><i class="fas fa-eye"></i></a>
                            <a href="{{ route( 'contentbox.edit', $contentBox->id ) }}" class="btn btn-outline-primary" style="width: 40px"><i class="fas fa-pen"></i></a>
                            <form class="form-delete" action="{{ route('contentbox.destroy', $contentBox->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>

            @endforeach

        @endslot
    @endcomponent
@endsection
