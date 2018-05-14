@extends('layouts.dashboard.app')

@section('titulo','-sobre')

@section('content')
<div class="row">
  <div class="col l12 m12">
        <div id="card_sobre" class="card" style=" box-shadow:none;border-radius: 5px;
                        border-bottom-right-radius: 5px; margin-top:20px;">
                <img src="{{ asset('img/logo/arte_sobre.gif') }}" class="responsive-img">

        </div>
  </div>
</div>

<div class="row">
  <div class="col l12 m12">
    <div class="card blue-grey darken-1">
        <div class="card-content white-text">


          <span class="card-title">Sobre nossa plataforma</span>
        <dl>
          <dt>Objetivo:</dt>
          <dd>Atender pequenas e médias instituições de ensino de nível técnico e profissionalizante.</dd>

          <dt>Missão:</dt>
          <dd><p >O SIGes-A foi desenvolvido com o propósito de facilitar o gerenciamento de alunos em instituições de ensino da área técnica e profissionalizante,  assim como melhorar o acesso dos alunos  às atividades acadêmicas. </p></dd>
          <dt >Bônus Instituição:</dt>
          <dd>Sua escola contará com diversas funcionalidades da área acadêmica como:</dd>
          <dd><i class="material-icons icon_sobre">check</i>Gerenciamento  de alunos;</dd>
          <dd><i class="material-icons icon_sobre">check</i>Gerenciamento de professores;</dd>
          <dd><i class="material-icons icon_sobre">check</i>Gerenciamento de cursos;</dd>
          <dd><i class="material-icons icon_sobre">check</i>Realizar notificação via e-mail;</dd>
          <dd><i class="material-icons icon_sobre">check</i>Enviar e-mail de market sobre cursos;</dd>
          <dd><i class="material-icons icon_sobre">check</i>Gerenciamento financeiro com contrato em assinatura ou boletos;</dd>
          <dt>Bônus Alunos:</dt>
          <dd>Ao utilizar o SIGes-A  a instituição poderá disponibilizar para os seus alunos os seguintes serviços:</dd>
          <dd><i class="material-icons icon_sobre">check</i>Visualizar seus dados pessoais e financeiro;</dd>
          <dd><i class="material-icons icon_sobre">check</i>Pagamentos online;</dd>
          <dd><i class="material-icons icon_sobre">check</i>Calendário institucional;</dd>
          <dd><i class="material-icons icon_sobre">check</i>Visualizar grade curricular do curso;</dd>
          <dd><i class="material-icons icon_sobre">check</i>Visualizar frequência;</dd>
          <dd><i class="material-icons icon_sobre">check</i>Visualizar notas;</dd>
          <dd><i class="material-icons icon_sobre">check</i>Quadro de Horários;</dd>
          <dd><i class="material-icons icon_sobre">check</i>Realizar testes online;</dd>
          <dd><i class="material-icons icon_sobre">check</i>Área de conteúdo;</dd>
          <dd><i class="material-icons icon_sobre">check</i>E-mails informativos;</dd>
          <dd><i class="material-icons icon_sobre">check</i>Atendimentos;</dd>
      </dl>
      <p>Caso tenha se identificado com nossa plataforma entre em <a href="{{ url('/empresa/contato') }}" id="link_contato">contato</a> com nossa equipe para que seja implementado esse sistema em sua instituição,
      e deixe sua empresa muito mais organizada e profissional, além de poder ter total controle de todos os processos da mesma.
      </div>
    </div>
  </div>
</div>


@endsection
