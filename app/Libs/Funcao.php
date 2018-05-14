<?php 
 namespace App\lib;

class Funcao{

     public function quebraDeLinha($string,$num){
        $cont = strlen($string);//tamanho da string
        $quebra = $num; //numero de caracteres que ficar em uma linha
        $contQuebra = 0;//controlar o numero de 
        $textoformatado = " ";//texto ja com quebra de linha
       // echo $cont;
        if($cont >= 0){
            for( $i = 0; $i < $cont;$i++ ){
                if($contQuebra == $quebra){
                    $textoformatado = $textoformatado.$string[$i]."\n";
                    $contQuebra = 0;
                }else{
                    if($string[$i] == " " & $contQuebra == 0){
                        $contQuebra = 0;
                    }else{
                        $textoformatado = $textoformatado.$string[$i];
                        $contQuebra++;
                    }
                   
                }    
            }
        }
       //echo $textoformatado;
        return $textoformatado;
     }
 }