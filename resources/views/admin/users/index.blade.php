@extends('admin.layouts.app')

@section('content')
    @component('admin.components.table')
        @slot('title', 'Listagem')

        @slot('head')
            <td>Nome</td>
            <td>Email</td>
        @endslot
        @slot('body')
            @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <div class="text-center btn-list">
                                <a href="#" class="btn btn-outline-primary" style="width: 40px"><i class="fas fa-pen"></i></a>
                                <form class="form-delete pl-2" action="{{ route('users.destroy', $user->id) }}" method="post">
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
