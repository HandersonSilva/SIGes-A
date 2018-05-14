@extends('layouts.dashboard.app')

@section('titulo','RN')

@section('content')

<!--form de teste-->
<div class="row">
    <div class="col s12 m9 l10">
      <div id="formPropaganda" class="scrollspy ">
      <div  class="container">
      <h4>Testando cadastro de propaganda de cursos na HOME</h4><br/>

        @if(Session::has('flash_message'))
            <div class="card-panel {{Session::get('flash_message')['class']}}">
                <strong style="color: #ffffff;">{{Session::get('flash_message')['msg']}}</strong>
            </div>

       @endif
        <form action="{{ route('salvar') }}" enctype="multipart/form-data"  method="POST" >
                <div  class="row" >
                        <input type="hidden" name="_token" value="<?php echo csrf_token();?>" ><!--passando um token-->
                        
                        <div class="input-field col s12 l6 m6">
                               
                                <select name="SGA_cursos_nome">
                                <option value="" disabled selected>Cursos</option>
                                @foreach($cursos as $curso)
                                        
                                        <option  value="{{ $curso->SGA_cursos_nome}}">{{ $curso->SGA_cursos_nome}}</option>
                                @endforeach            
                                        
                                </select>
                        
                        
                                <label for="SGA_cursos_nome">Curso</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                                <input placeholder="Placeholder" id="valor_curso"  name="SGA_propaganda_cursoHome_valor" type="text" >
                                <label for="first_name">Valor do Curso</label>
                        </div>
                        @foreach($instituicao as $escola)
                        <input type="hidden" value="{{ $escola->id}}" name="SGA_instituicao_id"  >
                                      
                        <div class="input-field col s12 m6 l6">
                                <div class="input-field col s12 m6 l6 ">
                                     
                                        <input value="{{ $escola->SGA_instituicao_nomeFantasia}}" name="SGA_instituicao_nomeFantasia" type="text" >
                                       
                                       <label>Instituição</label>
                                </div>
                        </div>
                        <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix">phone</i>
                                <input value="{{ $escola->SGA_instituicao_telfixo}}" name="SGA_instituicao_telfixo" type="tel"   >
                                <label for="icon_telephone">Telephone</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                                <div class="input-field col s12">
                                        <i class="material-icons prefix">email</i>
                                        <input value="{{ $escola->SGA_instituicao_email}}" name="SGA_instituicao_email" type="email" class="validate" >
                                        <label for="email">Email</label>
                                 </div>
                        </div>
                        <div class="input-field col s12 l6 m6">
                              <select name="SGA_destaque_curso" id="destaque_curso">
                                    <option value="" disabled selected>Selecione</option>
                                    <option  value="S">Sim</option>
                                    <option  value="N">Não</option>
                                     
                                </select>
                               <label for="destaque_curso">Destacar curso?</label>
                        </div>
                       @endforeach
                        <div class="input-field col s12 l12">
                            <textarea id="sobre_curso" name="SGA_propaganda_cursoHome_sobre" class="materialize-textarea validate"  data-length="150" cols="30" rows="5" wrap="hard"></textarea>
                            <label for="textarea1">Sobre o curso</label>
                        </div>
                        <div class="input-field col s12">
                                <h5>Incrições De</h5><br/>
                        </div>
                        <div class="input-field col s12">
                                
                                <label for="textarea1">Data Inicial</label>
                                <input type="text" id="dateInicial_curso_propaganda" name="SGA_propaganda_cursoHome_dateInc" class="datepicker">
                        </div>
                      
                        <div class="input-field col s12">
                                <h5>até</h5><br/>
                        </div>
                      
                        <div class="input-field col s12">
                               
                                <label for="textarea1">Data Final</label>
                                <input type="text" id="dateFinal_curso_propaganda"  name="SGA_propaganda_cursoHome_dateFim" class="datepicker">
                        </div>
                        <div class="input-field col s12">
                               
                            <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Imagem do Curso</span>
                                        <input type="file" name="SGA_propaganda_cursoHome_img">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path " name="SGA_propaganda_cursoHome_img2" type="text">
                                    </div>
                            </div>
                        </div>
                      
                      
                </div><!-- fim row -->    
          
         <br/>
            
         <button class="btn waves-effect waves-light" type="submit" >Enviar
                <i class="material-icons right">send</i>
         </button>
         <div>
                <br/>
         </div>
       

      </form><!--fim form principal-->

      

      </div><!--fim container-->
      </div><!--fim div id formPropaganda -->
      <div class="divider"></div>
      <div id="teste_cad_img" class=" scrollspy ">
        
                <div class="container">
                <h4>Cadastro de Imagem no Slide da HOME</h4><br/>

                        @if(Session::has('flash_message'))
                        <div class="card-panel {{Session::get('flash_message')['class']}}">
                                <strong style="color: #ffffff;">{{Session::get('flash_message')['msg']}}</strong>
                        </div>

                        @endif
                        <form action="{{ route('cadSlider') }}" enctype="multipart/form-data"  method="POST" >
                                <div  class="row" >
                                        {{ csrf_field() }}
                                        <div class="input-field col s6">
                                                <div class="input-field col s12">
                                                
                                                </div>
                                        </div>
                                        <div class="input-field col s12">
                                             
                                        </div>
                                                        
                                        
                                
                                        <div class="input-field col s12">
                                        
                                                <div class="file-field input-field">
                                                        <div class="btn">
                                                                <span>Imagem para o slide</span>
                                                                <input type="file" name="img_slider" >
                                                        </div>
                                                        <div class="file-path-wrapper">
                                                                <input class="file-path " name="img_slider2" type="text">
                                                        </div>
                                                </div>
                                        </div>
                                
                                
                                </div><!-- fim row -->    
                        
                        <br/>
                        @foreach($instituicao as $escola)
                        <input type="hidden" name="idInstituicao" value="{{ $escola->id }}">
                        @endforeach
                        <button class="btn waves-effect waves-light" type="submit" >Enviar
                                <i class="material-icons right">send</i>
                        </button>
                        <div>
                                <br/>
                        </div>


                        </form><!--fim form principal-->



                     
                </div><!--fim do container-->
      </div>
      <div id="teste2" class=" scrollspy">
                <div class="container">
                        <p>Novo teste aqui </p>
                    
                </div>
     
      </div>
    </div><!--fim div col s12 m9 l10-->

    <div class="col hide-on-small-only m3 l2">
      <ul class="table-of-contents fixed">
        <li><a href="#formPropaganda">Cadastro de curso na home</a></li>
        <li><a href="#teste_cad_img">Cadastro de Imagem no Slide da HOME</a></li>
        <li><a href="#teste2">Novo teste</a></li>
      </ul>
    </div>
  </div><!-- fim div row do menu-->
     
       
     
    
     
 @endsection