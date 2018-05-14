<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cursos extends Model
{
    //
    //use Notifiable;

    protected $fillable = array('fk_instituicao_id','SGA_cursos_nome',
    'SGA_cursos_duracao');
}
