<?php

namespace Laraerp;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

    protected $table = 'clientes';
    protected $fillable = ['nome', 'razao_apelido', 'documento', 'nascimento_fundacao'];
    
    public static $rules = array(
        'fk_pessoa' => 'required|numeric|exists:pessoas,id',
    );

    /**
     * Belongs to Pessoa
     */
    public function pessoa() {
        return $this->belongsTo('Laraerp\Pessoa', 'fk_pessoa');
    }

}
