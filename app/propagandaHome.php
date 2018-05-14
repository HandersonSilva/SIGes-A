<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class propagandaHome extends Model
{
    //
    //use Notifiable;

    protected $fillable = [
        'fk_instituicao_id','fk_admin_instituicao_id','SGA_propaganda_cursoHome_nomeCurso','SGA_propaganda_cursoHome_sobre',
        'SGA_propaganda_cursoHome_valor','SGA_propaganda_cursoHome_dateInc','SGA_propaganda_cursoHome_dateFim',
        'SGA_propaganda_cursoHome_img','destaque'

      
    ];


    public function instituicao(){

    	return $this->belongsTo('App\Instituicao','fk_instituicao_id');
    }

    public function admin(){
        return $this->belongsTo('App\admin_instituicao','fk_admin_instituicao_id');
    }

    
}
