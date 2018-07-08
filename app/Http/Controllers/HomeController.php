<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\HomeContatoRequest;
use App\Libs\Envio_email_sendGrid\Enviar_email;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Event;
use App\Events\SomeEvent;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       
       //Busca das instituições cadastradas
        $instituicao = DB::table('instituicaos')
        ->select('id', 'SGA_instituicao_nomeFantasia')
        ->get()->toArray();

        //Objeto data
        $data = array();

       //Busca dos curso mediante as instituições cadastradas
        for ($i = 0; $i < sizeof($instituicao); $i++){


            try{

                $imgs_slide = DB::table('slidesHomes')
                ->join('instituicaos', 'instituicaos.id', '=','slidesHomes.fk_instituicao_id_slide')
                ->select('slidesHomes.*')
                ->get();

                $cursosDestaques = DB::table('propaganda_homes')
                ->join('instituicaos', 'instituicaos.id', '=','propaganda_homes.fk_instituicao_id')
                ->select('propaganda_homes.*', 'instituicaos.SGA_instituicao_nomeFantasia', 'instituicaos.SGA_instituicao_telfixo', 'instituicaos.SGA_instituicao_email')
                ->where([
                    'propaganda_homes.fk_instituicao_id'=>$instituicao[$i]->id,
                    'destaque'=>'S'
                ])
                ->orderBy('id','desc')
                ->take(8)
                ->get()->toArray();

                //data conterar o um array de instituições e outro array com os cursos
                $data[$i]= array(
                    'id' => $instituicao[$i]->id,
                    'instituicao'=>$instituicao[$i]->SGA_instituicao_nomeFantasia,
                    'cursos'=>$cursosDestaques
                );

            }catch(Exception $e){
                echo 'Erro '.$e->getMessage();
            }

        }
        //teste data
       /* foreach($data as $dados){
           // echo $dados['instituicao'];
            foreach($dados['cursos'] as $cursos){
                print_r($cursos->id);
            }

        }*/

       //print_r($data);
       //echo sizeof($data);

        return view('layouts.home.home',compact('data','imgs_slide'));

    }

    public function todosCursos($id){



        //Busca a instituicao referente ao id passado por parametro
        $instituicao = \App\Instituicao::find($id);

        //Busca das instituição por ID
        $instituicaoId = $id;



       //Busca dos curso mediante as instituições cadastradas

            try{
                $dataCursos = DB::table('propaganda_homes')
                ->join('instituicaos', 'instituicaos.id', '=','propaganda_homes.fk_instituicao_id' )
                ->select('propaganda_homes.*', 'instituicaos.SGA_instituicao_nomeFantasia', 'instituicaos.SGA_instituicao_telfixo', 'instituicaos.SGA_instituicao_email')
                ->where('propaganda_homes.fk_instituicao_id', '=',$instituicaoId)
                ->get();



            }catch(Exception $e){
                echo 'Erro '.$e->getMessage();




          //testes
          /* for($i=0;$i <sizeof($dataCursos);$i++){
                print_r($dataCursos[$i]->SGA_propaganda_cursoHome_nomeCurso);
            }*/
       // echo "quantidade de cursos = ".sizeof($dataCursos);
        // print_r($dataCursos);

        }

        return view('layouts.empresa.todosCursos',compact('dataCursos','instituicao'));
}


public function sobre()
{
    return view('layouts.home.sobre');
}

public function contato()
{
    return view('layouts.home.contato');
}

public function enviaMsg(Request $request ){
   /*
   Varieveis que estão vindo no request
    $nome = $request->nome_contatoN;
    $telefone = $request->tel_contatoN;
    $email = $request->email_contatoN;*/
    //Salvar dados do contato em uma tabela
    //A fazer-------------------------

     $sendGrid = new Enviar_email();
       //envio para o SIGA
     $sendGrid->enviarEmailUser($request);


    //envio para o usuario

<<<<<<< HEAD
    //router layout de confirmação de envio
    //return redirect()->route('home.contato.emailsuccess');
=======
 
>>>>>>> upstream/master

}

    public function create()
    {

    }

}

