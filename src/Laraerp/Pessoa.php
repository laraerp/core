<?php

namespace Laraerp;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model {

    protected $table = 'pessoas';
    protected $fillable = ['nome', 'razao_apelido', 'documento', 'nascimento_fundacao'];

}
