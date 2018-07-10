@extends('layouts.dashboard.app')

@section('titulo','contato')

@section('content')
    <div class="container">
      <div class="row">
        <div class="card-panel " id="card_email_msg">
          <div class="row">
            <div class="col s12 m12 l12 center">
                <img src="{{asset('img/logo/icon_success.png')}}" alt="" class="responsive-img responsive-email">
            </div>
            <div class="col s12 m12 l12 center">
                <h2 id="text_success_email" class="center-align">Seu email foi enviado com sucesso, e em breve entraremos em contato!</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
