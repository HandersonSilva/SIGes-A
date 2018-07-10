<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserContato extends Model
{
    //

    protected $fillable = array(
        'nome_contato',
        'tel_contato',
        'email_contato',
        'msg_contato',
        'status_envio_email_adm'
    );
}
