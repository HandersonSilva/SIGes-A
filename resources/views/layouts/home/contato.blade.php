@extends('layouts.dashboard.app')

@section('titulo','contato')

@section('content')
<div class="row"><!--inicio row-->
  <div class="col s12 m10 l10 offset-l1"><!--inicio col-->
    <div class="card-panel grey lighten-3" id="panel_contato"><!--inicio card panel-->
      <h5 class="text-white">Formulário de contato</h5>
      <span>Precisa de ajuda?</span>
      <span>Preencha o formulário</span>
      <p class="valign-wrapper"><i class="material-icons" style="color:#4db6ac ;">info</i> Dica:se não encontrar nossos emails em sua caixa de entrada, verifique sempre sua caixa de spam</p>
    </div><!--fim card panel-->

    @if(Session::has('flash_message'))
        <div class="card-panel {{Session::get('flash_message')['class']}}">
            <strong style="color: #ffffff;">{{Session::get('flash_message')['msg']}}</strong>
        </div>

   @endif
    <form  id="frmContato"  class="col s12" method="post" action="{{ route('home.contato.enviar') }}"><!--inicio form-->
      {{ csrf_field()  }}
      <div class="row">
        <div class="input-field col m6 l6 s12">
          <i class="material-icons prefix">account_circle</i>
          <label for="nome_contato">Nome</label><br/>
          <input  id="nome_contato" name="nome_contatoN" type="text" >


        </div>
        <div class="input-field col s12 m6 l6">
          <i class="material-icons prefix">phone</i>
          <label for="tel_contato">Telefone</label><br/>
          <input id="tel_contato" type="text"  name="tel_contatoN" >


        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mail</i>
          <label for="email_contato">Email</label><br/>
          <input  type="text" name="email_contatoN"  id="email_contato" >



        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">comment</i>
          <label for="textAreaContato">Mensagem</label><br/>
          <textarea id="textAreaContato" name="textAreaContatoN" class="materialize-textarea" data-length="150"></textarea>


        </div>
      </div>
      <div class="row">
        <div class="col s12 m8 l8 offset-l5">
          <button class="waves-effect waves-light btn center" type="submit"><i class="material-icons left">drafts</i>Enviar</button>
        </div>
      </div>

    </form>
  </div><!--fim col-->
</div><!--fim row-->

@endsection
