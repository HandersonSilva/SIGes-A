<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--arquivos de fontes do google -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
      <!--
      <link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css"/>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.css"/>
  -->


        <!-- Compiled and minified CSS
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
-->

        <!-- inserindo materialize-->

        <link rel="stylesheet" type="text/css" href="{{asset('lib/materialize/dist/css/materialize.min.css')}}">

        <!-- Add the slick-theme.css if you want default styling -->
        <link rel="stylesheet" type="text/css" href="{{asset('lib/slick-carousel/slick/slick.css')}}"/>
         <!-- Add the slick-theme.css if you want default styling -->
         <link rel="stylesheet" type="text/css" href="{{asset('lib/slick-carousel/slick/slick-theme.css')}}"/>
         <link rel="stylesheet" type="text/css" href="{{asset('css/SGA.css')}}">


        <title>SIGes-A @yield('titulo')</title>

       <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    </head>
    <body>

      @include('layouts._includesDashboard._nav')


      <div id="modal" class="modal header-sheet">
        <div class="modal-content">
          <h4>Bem vindo(a) ao SIGes-A</h4>
          <p>Alguma coisa aqui</p>
        </div>
         <div class="modal-footer">
           <a  class="modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>
         </div>
      </div>


        @yield('content')



        @include('layouts._includesDashboard._footer')
        @if(!Auth::guest())
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hide">
                {{ csrf_field() }}
            </form>
        @endif

        <!-- Compiled and minified JavaScript
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
                  -->





        <script src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
        <script src="{{asset('lib/jquery/dist/jquery.validate.min.js')}}"></script>
        <script src="{{asset('lib/slick-carousel/slick/slick.js')}}"></script>
        <script src="{{asset('js/SGA.js')}}"></script>

        <script src="{{asset('lib/materialize/dist/js/materialize.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.mask.js') }}">

        </script>






        <!-- Scripts -->
        @stack('scripts')
    <script type="text/javascript">
        $( document ).ready(function(){
            $(".button-collapse").sideNav();
            $('select').material_select();
        });
    </script>

    </body>
</html>
