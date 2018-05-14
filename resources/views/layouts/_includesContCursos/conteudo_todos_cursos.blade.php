<!--for nos cursos-->
  @for($i=0;$i < 1;$i++) 
  <h5><b>{{$dataCursos[$i]->SGA_instituicao_nomeFantasia }}</b></h5>
  <div class="row">
  @for($i=0;$i < sizeof($dataCursos);$i++) 
        <div class="col s12 m6 l4">
            <div id="card_carousel" class="card hoverable">
                 <div id="card-image-cursos" class="card-image ">
                   <img src="{{ asset($dataCursos[$i]->SGA_propaganda_cursoHome_img) }}">
                   <span class="card-title">{{ $dataCursos[$i]->SGA_propaganda_cursoHome_nomeCurso }}</span>
                   <a class="btn-floating halfway-fab waves-effect waves-light teal lighten-2  activator"><i class="material-icons">add</i></a>
                 </div>
                 <div class="card-content">
                   <h6 class="truncate"><b>{{$dataCursos[$i]->SGA_propaganda_cursoHome_nomeCurso  }}</b></h6>
                   <p><b>Valor:</b> R$ {{$dataCursos[$i]->SGA_propaganda_cursoHome_valor }}</p><br/>
                 </div>
                   
 
                 <div class="card-reveal"> <!--Card Informação-->
           
                       <span class="card-title grey-text text-darken-4">
                       {{ $dataCursos[$i]->SGA_propaganda_cursoHome_nomeCurso }}
                       <i class="material-icons right">close</i></span>
                       <div class="divider"></div>
                         <div class="section">
                             <p align="justify">{{ $dataCursos[$i]->SGA_propaganda_cursoHome_sobre }}</p>
                         </div>
                         <div class="divider"></div>
                         <div class="section">
                           <h5>Periodo de inscrição</h5>
                           <p><b>De</b> {{ $dataCursos[$i]->SGA_propaganda_cursoHome_dateInc }}
                              <b>Até </b>{{ $dataCursos[$i]->SGA_propaganda_cursoHome_dateFim }}</p>
                         
                         </div>
                         <div class="divider"></div>
                         <div class="section">
                           
                               <h5>Contato</h5>
                               <P><b>Tel: </b>{{ $dataCursos[$i]->SGA_instituicao_telfixo }}</p>
                               <p><b>Email: <a></a>{{ $dataCursos[$i]->SGA_instituicao_email }}</b></p>
                               
                           
                         </div>
                 
             </div><!--fim Card Informação-->
           </div><!--fim Card -->
            
        </div><!--fim col s12 m6 l3-->
  @endfor
  </div> <!--fim row-->
@endfor

