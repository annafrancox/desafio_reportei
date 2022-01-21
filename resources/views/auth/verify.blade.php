@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7" style="margin-top: 2%">
                <div class="box">
                    <h3 class="box-title" style="padding: 2%">Verifique seu email de acesso</h3>

                    <div class="box-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">Um novo link de verificação foi enviado para seu endereço de email!                            </div>
                        @endif
                        <p>Antes de continuar, confira seu email para a verificação do link. Se você não recebeu o email, </p>
                        <a href="{{ route('verification.resend') }}">clique aqui para solicitar outro.</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
