<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    // use Notifiable;

    protected $fillable = [
        'SGA_instituicao_nomeFantasia','SGA_instituicao_cnpj',
        'SGA_instituicao_telfixo','SGA_instituicao_celular',
        'SGA_instituicao_email'
    ];


	public function propagandas(){
		return $this->hasMany('\App\propagandaHome','fk_instituicao_id');
	 } 

	public function admins()
	{
		return $this->hasMany('\App\admin_instituicao','fk_instituicao_id');
	}
}
