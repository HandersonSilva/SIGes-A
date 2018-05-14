<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin_instituicao extends Model
{
     use Notifiable;

    protected $fillable = [
        'fk_instituicao_id','SGA_admin_instituicao_nome',
        'SGA_admin_instituicao_email','SGA_admin_instituicao_pass'
      
    ];

}