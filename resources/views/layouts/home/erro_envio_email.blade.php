@extends('layouts.dashboard.app')

@section('titulo','contato')

@section('content')
    <div class="container">
      <div class="row">
        <div class="card-panel " style="border: 2px solid #bdbdbd; border-radius: 5px; box-shadow: none; margin-top: 30px;">
          <div class="row">
            <div class="col s12 m12 l12" align="center">
                <img src="{{asset('img/logo/Error-message.png')}}" class="responsive-img responsive-email" width="250">
            </div>
            <div class="col s12 m12 l12">
                <h2 class="center-align lighten-1" style="font-family: 'Didact Gothic', sans-serif; color: #bdbdbd; ">Houve um erro durante o envio do email</h2>
            </div>

              <div class="col s12 m12 l12" align="center">
                  <a href="{{ route('home.contato') }}" style="color: #4db6ac">Tentar novamente</a>
              </div>
          </div>
        </div>
      </div>
    </div>
@endsection
