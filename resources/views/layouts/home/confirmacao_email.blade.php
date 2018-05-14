@extends('layouts.dashboard.app')

@section('titulo','contato')

@section('content')
    <div class="container">
      <div class="row">
        <div class="card-panel " id="card_email_msg">
          <div class="row">
            <div class="col m8 l8 offset-l4">
                <img src="{{asset('img/logo/icon_success.png')}}" alt="">
            </div>
            <div class="col m10 l10 offset-l1">
                <h2 id="text_success_email" class="center-align">Seu email foi enviado com sucesso, e em breve entraremos em contato!</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
