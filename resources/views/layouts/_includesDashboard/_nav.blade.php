<div id="navbar" class="navbar-fixed">
          <nav>
              <div class="nav-wrapper teal lighten-2" >
                  <div class="container">

                      <a href="{{ route('home') }}"  class="brand-logo">
                      <!-- a class "icon hide-on-med-and-down" mostra apenas quando esta em modo desktop-->
                         <i ><img id="logoHome" width="100px" height="35px" class="icon hide-on-med-and-down" src="{{ asset('img/logo/logo_nav.png') }}" class="hide-on-small-only"><span class="hide-on-large-only"><b>SIGes-A</b></span></img>

                        </i>
                        </a>

                      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                      <ul class="right hide-on-med-and-down">
                          <li id="home_nav" ><a href="{{ route('home') }}">Home</a></li>
                          <li><a href="#">Aluno</a></li>
                          <li><a href="#" >Empresa</a></li>
                          <li><a href="{{ route('home.sobre') }}" >Sobre</a></li>
                          <li><a href="{{ route('home.contato') }}" >Contato</a></li>

                      </ul>
                      <ul class="side-nav" id="mobile-demo">
                          <li><a href="#" >Home</a></li>
                          <li><a href="#" >Aluno</a></li>
                          <li><a href="#" >Empresa</a></li>
                          <li><a href="#" >Sobre</a></li>
                          <li><a href="#" >Suporte</a></li>
                           <li><a href="{{  route('teste') }}" >Teste cadastro curso</a></li>
                      </ul>
                  </div><!-- fim container-->
              </div>
            </nav><!--fim nav-->
      </div><!--fim da fixed-->
