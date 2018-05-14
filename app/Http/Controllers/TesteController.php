<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\lib\canvas\canvas;
use Mockery\Exception;
use App\cursos;
use App\propagandaHome;
use App\lib\Funcao;

class TesteController extends Controller
{
     //criar um construtor 
     public function __construct(){
        //permitir conexao http em alguns navegadores
        header('Access-Control-Allow-Origin:*');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

       /* $texto = "aaaaa bbbbcccc aaaaa banana aaaaa bbbb";
        $texto = "É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de Conteúdo aqui, conteúdo aqui, fazendo com que ele tenha uma aparência similar a de um texto legível. Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por 'lorem ipsum' mostra vários websites ainda em sua fase de construção. Várias versões novas surgiram ao longo dos anos, eventualmente por acidente, e às vezes de propósito (injetando humor, e coisas do gênero).";
        //teste função
        $linha = new Funcao();
        $textoQuebra = $linha->quebraDeLinha($texto,28);
        
        echo $textoQuebra;*/


        //Dado que teremos que ter aqui para gerar um auto complete é o id da instituição 
        //recuperando arquivo do banco
        
         $idInstituicao = 1;
         $cursos = DB::table('cursos')->get()->where('fk_instituicao_id', $idInstituicao);//dados dos cursos
         $instituicao = DB::table('instituicaos')->get()->where('id', $idInstituicao);//dados da instituição
       
        /*echo "Variavel = ";
         print_r($instituicao);*/
        
        return view('layouts.tests.SGA_teste',compact('cursos','instituicao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setPropagandaCursos(Request $request){


        //////////////Code tratamento de imagem//////////
        //configurando as pastas
        $dir = "../public/img/imgRedimensionado/";
        $past = "../public/img/imgOriginal/";
        $assetImg = "/img/imgRedimensionado/";


        //restringindo o tipo de arquivo
        $extImg = array('jpg','png'); 

        //setando variaveis
        $arquivo = $_FILES['SGA_propaganda_cursoHome_img'];
        $file = $dir.$arquivo['name'];
        $nomeImgOrigin = $arquivo['name'];

        //pegando a extensão
        $separador = explode(".", $arquivo['name']);
        //transformando em minusculo
        $ext = strtolower(end($separador));
        //verificar posição do elemento
        $statusPosicao = array_search($ext, $extImg);
        $statusPosicao;

        //verifica se a extenção existe no array e retorna a posição dele
        if($statusPosicao ===0 or $statusPosicao === 1){
            //função upload img
                if(move_uploaded_file($arquivo['tmp_name'], $past.$nomeImgOrigin)){
                    

                    //lib responsavel em reduzir o tamanho de uma img
                    $canvasImg  = new canvas();
                    //salvar imagem reduzida
                    $statusCanvas = $canvasImg->carrega( $past.$nomeImgOrigin )
                    ->hexa( '#FF005C' )
                    ->redimensiona( 280, 260, 'preenchimento' )
                    ->grava($dir.$nomeImgOrigin);
                    echo "status = ".$statusCanvas;
                        if($statusCanvas ){
                        echo "<hr/><br/>";
                        echo $dir.$nomeImgOrigin;
                        //$idCursoGet = DB::table('cursos')->select('id')->where('SGA_cursos_nome', $nomecurso)->get();//pegar id do curso
                      
                        //get dados e salvar no banco 
                        $idInstituicao = isset($_POST['SGA_instituicao_id'])?$_POST['SGA_instituicao_id']:""; 
                        $idAdminInstituicao = 1;
                        $cursoNome =isset($_POST['SGA_cursos_nome'])? $_POST['SGA_cursos_nome']:"";
                        $curso_destaque = isset($_POST['SGA_destaque_curso']) ? $_POST['SGA_destaque_curso']:"";
                        $cursoSobre = isset($_POST['SGA_propaganda_cursoHome_sobre'])?$_POST['SGA_propaganda_cursoHome_sobre']:"";
                        
                        $cursoValor = isset($_POST['SGA_propaganda_cursoHome_valor'])?$_POST['SGA_propaganda_cursoHome_valor']:""; 
                        $cursoDataInc = isset($_POST['SGA_propaganda_cursoHome_dateInc'])?$_POST['SGA_propaganda_cursoHome_dateInc']:""; 
                        $cursoDataFim = isset($_POST['SGA_propaganda_cursoHome_dateFim'])?$_POST['SGA_propaganda_cursoHome_dateFim']:""; 
                        $cursoImg = $assetImg.$nomeImgOrigin;
                       
                        //Dar quebra de linha no campo texto
                        //$funcao = new Funcao();

                       
                        //salvar no banco                                 
                        $propagandaHome = DB::table('propaganda_homes')->insert([
                            'fk_instituicao_id' =>  $idInstituicao,
                             'fk_admin_instituicao_id' => $idAdminInstituicao,
                             'SGA_propaganda_cursoHome_nomeCurso' =>  $cursoNome,
                             'SGA_propaganda_cursoHome_sobre' => $cursoSobre,
                             'SGA_propaganda_cursoHome_valor' =>  $cursoValor,
                             'SGA_propaganda_cursoHome_dateInc' =>  $cursoDataInc,
                             'SGA_propaganda_cursoHome_dateFim' => $cursoDataFim,
                             'SGA_propaganda_cursoHome_img' =>  $cursoImg,
                             'destaque'=>$curso_destaque
                             
                             
                        ]);
                        if( $propagandaHome){
                        

                            \Session::flash('flash_message',[
                                'msg'=>'Curso cadastrado com sucesso!!!',
                                'class'=>'green'
                            ]);

                            return redirect()->route('teste');
                        }
                    }
                        
                    
                    
                    
            }   
            
        }else{
            
            \Session::flash('flash_message',[
                                'msg'=>'Formato de imagem não permitido!',
                                'class'=>'red darken-4'
                            ]);

                            return redirect()->route('teste');
        }
    }

    public function setDadosSlider(Request $request){
        //////////////Code tratamento de imagem//////////
        //configurando as pastas
        $dir = "../public/img/imgSlideRedimensionado/";
        $past = "../public/img/imgSlideOriginal/";
        $assetImg = "/img/imgSlideOriginal/";

        //restringindo o tipo de arquivo
        $extImg = array('jpg','png'); 

        //setando variaveis
        $arquivo = $_FILES['img_slider'];
        $file = $dir.$arquivo['name'];
        $nomeImgOrigin = $arquivo['name'];

        //pegando a extensão
        $separador = explode(".", $arquivo['name']);
        //transformando em minusculo
        $ext = strtolower(end($separador));
        //verificar posição do elemento
        $statusPosicao = array_search($ext, $extImg);
        $statusPosicao;

        //verifica se a extenção existe no array e retorna a posição dele
        if($statusPosicao ===0 or $statusPosicao === 1){
            //função upload img
                if(move_uploaded_file($arquivo['tmp_name'], $past.$nomeImgOrigin)){
                    
                        //$idCursoGet = DB::table('cursos')->select('id')->where('SGA_cursos_nome', $nomecurso)->get();//pegar id do curso
                      
                        //get dados e salvar no banco 
                        $idInstituicao = $request->input('idInstituicao');
                        $idAdminInstituicao = 1;
                        $titulo_slider = $request->input('tit_slider');
                        $msg_slider = $request->input('msg_slider');
                        $slide_img = $assetImg.$nomeImgOrigin;
                       
                        //Dar quebra de linha no campo texto
                       // $funcao = new Funcao();
                       // $cursoSobreFormat = $funcao->quebraDeLinha($cursoSobre,36);
                       
                        //salvar no banco                                 
                        $slide_home = DB::table('slidesHomes')->insert([
                             'imagem' => $slide_img,
                             'fk_instituicao_id_slide' => $idInstituicao,
                             'fk_admin_instituicao_id_slide' => 1
                        ]);
                        if( $slide_home ){
                        

                            \Session::flash('flash_message',[
                                'msg'=>'Slide cadastrado com sucesso',
                                'class'=>'green'
                            ]);

                            return redirect()->route('teste');

                        }else{
                             \Session::flash('flash_message',[
                                'msg'=>'Não foi possível cadastrar conteúdo para slider',
                                'class'=>'red darken-4'
                            ]);

                            return redirect()->route('teste');
                        }
                    }
                        
                    
                    
                    
            }else{
            
            \Session::flash('flash_message',[
                                'msg'=>'Arquivo de imagem não permitido',
                                'class'=>'red darken-4'
                            ]);

            return redirect()->route('teste');
        }
    }


    public function store(Request $request)
    {
      
         
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
