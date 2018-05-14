@extends('layouts.dashboard.app')

@section('titulo','todos os cursos')

@section('content')
<br>

<div class="container"><!--Inicio container-->
  <div class="card" style="border:1px solid #bdbdbd; box-shadow:none;border-bottom-left-radius: 5px;
   border-bottom-right-radius: 5px;">
    <nav>
          <div class="nav-wrapper grey">
            <div class="col s12">
              <a href="{{ route('home') }}" class="breadcrumb">Home</a>
              <a class="breadcrumb">Todos os cursos</a>
            </div>
          </div>
    </nav>
    
   
      @include('layouts._includesContCursos.conteudo_todos_cursos')
    </div>
</div><!--Fim container-->


    

@endsection