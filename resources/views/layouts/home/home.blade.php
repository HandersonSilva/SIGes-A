@extends('layouts.dashboard.app')

@section('titulo','')

@section('content')
<div class="slider">

          @if(empty($imgs_slide))
        <ul>
          <li>
            <img src="{{asset('img/curso4.jpg')}}" class="responsive-img"> <!-- random image -->
            <div class="caption center">
              <h3></h3>
              <h5 class="subtexto" class="light grey-text text-lighten-3"></h5>
            </div>
          </li>
          <li>
            <img src="{{asset('img/curso.jpeg')}}"> <!-- random image -->
            <div class="caption center-align">
              <h3></h3>
              <h5 class="subtexto" class="light grey-text text-lighten-3"></h5>
            </div>
          </li>
          <li>
            <img src="{{asset('img/curso.jpeg')}}"> <!-- random image -->
            <div class="caption center-align">
              <h3></h3>
              <h5 class="subtexto" class="light grey-text text-lighten-3"></h5>
            </div>
          </li>
        </ul>

          @else
          <ul class="slides">
            @foreach($imgs_slide as $slide)
                <li>
                  <img src="{{asset($slide->imagem)}}" class=" img_slide"> <!-- random image -->
                  <div class="caption center-align">
                  </div>
                </li>
            @endforeach
          </ul>
        @endif

  </div><!--final slide-->
<br/>

<!--aluno ou empresa-->

<div id="cont_aluno_empresa" class="container">
  <div class="row">

    <div class="col s12 m6 l6 center-align">
          <div id="cardAluno" class="card">
            <div class="card-image ">
              <img   src="{{asset('img/IconeAlunoEmpresa/aluno/aluno11.png')}}" class="img_alun_emp responsive-img">
            </div>
            <div class="card-content content_alu_emp">
              <span id="btnSouAluno" class="card-title center"><a href="#" target="_blanck" class="btn waves-effect waves-light gradient-45deg-red-pink mt-2 btn-large z-depth-5 ">Sou Aluno</a>
              </span>
            </div>
          </div>
    </div><!--fim col s12 m4 l5-->
    <div class="col s12 m6 l6 ">
      <div  id="cardEmpresa" class="card">
        <div class="card-image">
          <img   src="{{asset('img/IconeAlunoEmpresa/Empresa/empresa11.png')}}" class="img_alun_emp responsive-img">


        </div>
        <div class="card-content content_alu_emp">
          <span id="btnSouEmpresa" class="card-title center"><a href="#" target="_blanck" class="btn waves-effect waves-light gradient-45deg-red-pink mt-2 btn-large z-depth-5 ">Sou Empresa</a>
          </span>
        </div>

      </div>
    </div><!--fim col s12 m4 l5-->
</div><!--fim row-->
</div><!--fim container-->

<div id="propaganda_home" style="margin: auto;" class="row">
    <div class="col s12 l10 m12 offset-l1" >
      <img width="100%" src="{{asset('img/logo/banner_cursos.png')}}" class="img-responsive align-center">
    </div>
</div><!--fim row-->
<br/>


@foreach($data as $dt)<!--inicio foreach para cursos destaque-->
  @if(!empty($dt['cursos']))<!--inicio if -->

    <div  class="row blue-grey lighten-3 div_fundo_slide">
      <h2 class="titulo-secao">
        <span>
          <strong id="strong-titulo" class="pulse">Cursos em destaque</strong>
        </span>
    </h2>
  @php
    break;
  @endphp

 @endif<!--final if-->

@endforeach<!--fim foreach para cursos destaque-->


@foreach($data as $dados)<!--foreach nos instituicao-->

<!--slick responsivo-->
 @if(!empty($dados['cursos']))
 <div  class="row blue-grey lighten-3 div_fundo_slide">
  <div  class="row grey lighten-3" id="mySlide" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>

        <div id="titulo_secao_slide" class="row valign-wrapper">
            <div class="col s12 m6 l6">
                <h4 id="nome_inst">
                  {{$dados['instituicao']}}
                </h4>
            </div>

          <div class="col s12 m6 l6">
                <h2 id="maisCurso" class="right-align ">
                    <a href="{{ route('home.todoscursos',$dados['id']) }}" class="valign-wrapper lighten-3 hide-on-med-and-down">Veja todos os cursos
                    <i class="material-icons valign-wrapper ">chevron_right</i>
                    </a>
                    <a href="{{ route('home.todoscursos',$dados['id']) }}" id="btn_mobile" class="waves-effect waves-light btn tooltipped teal lighten-2 hide-on-large-only " data-position="top" data-delay="50" data-tooltip="Ver todos os cursos" style="color: #ffffff;">Mais</a>
               </h2>
          </div>
</div>

<div  class=" multiple-items responsive content-slick  slick-slider">

    @foreach($dados['cursos'] as $cursos)<!--foreach nos cursos-->

         <div class="item">

             <div id="card_carousel" class="card hoverable">
                 <div id="card-image-cursos" class="card-image ">
                   <img height="260px" src="{{ asset($cursos->SGA_propaganda_cursoHome_img) }}" class="responsive-img">
                   <span class="card-title"></span>
                   <a class="btn-floating halfway-fab waves-effect waves-light teal lighten-2  activator"><i class="material-icons">add</i></a>
                 </div>
                 <div class="card-content">
                   <h6 class="truncate"><b></b></h6>
                   <p><b>Valor:</b> R$ {{number_format($cursos->SGA_propaganda_cursoHome_valor, 2, ',', ' ') }}</p><br/>
                 </div>


                  <div class="card-reveal"> <!--Card Informação-->

                       <span class="card-title grey-text text-darken-4">
                       {{ $cursos->SGA_propaganda_cursoHome_nomeCurso }}
                       <i class="material-icons right">close</i></span>
                       <div class="divider"></div>
                         <div class="section">
                             <p >{{ $cursos->SGA_propaganda_cursoHome_sobre}}</p>
                         </div>
                         <div class="divider"></div>
                         <div class="section">
                           <h5>Periodo de inscrição</h5>
                           <p><b>De</b> {{ $cursos->SGA_propaganda_cursoHome_dateInc }}
                              <b>Até </b>{{ $cursos->SGA_propaganda_cursoHome_dateFim }}</p>

                         </div>
                         <div class="divider"></div>
                         <div class="section">

                               <h5>Contato</h5>
                               <P><b>Tel: </b>{{ $cursos->SGA_instituicao_telfixo }}</p>
                               <p><b>Email: <a></a>{{ $cursos->SGA_instituicao_email }}</b></p>


                         </div>

             </div><!--fim Card Informação-->
           </div><!--fim Card -->
      </div><!--fim item-->

        @endforeach
   </div><!--fim responsivo-->
 </div><!--fim mySlide-->

  @endif
  @endforeach

</div><!--fim cursosBackground-->


</div><!--fim div cursos destaque nome-->




</div><!--?-->


@endsection
