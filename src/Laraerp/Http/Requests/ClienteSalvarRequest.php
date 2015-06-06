<?php namespace Laraerp\Http\Requests;

class ClienteSalvarRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'nome' => 'required',
            'documento' => 'required',
        ];

        /*
         * Se preencheu algum campo do endereço..
         */
        if($this->enderecoPreenchido()){
            $rules = array_merge($rules, [
                'endereco.cep' => 'required',
                'endereco.logradouro' => 'required',
                'endereco.numero' => 'required',
                'endereco.bairro' => 'required',
                'endereco.cidade_id' => 'required|exists:cidades,id',
            ]);
        }

        /*
         * Se preencheu algum campo de contato..
         */
        if($this->contatoPreenchido()){
            $rules = array_merge($rules, [
                'contato.responsavel' => 'required',
                'contato.email' => 'email'
            ]);
        }

        return $rules;
    }

    public function enderecoPreenchido(){
        return $this->checkFilled($this->get('endereco'));
    }

    public function contatoPreenchido(){
        return $this->checkFilled($this->get('contato'));
    }

}
