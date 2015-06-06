<?php namespace Laraerp\Http\Requests;

class SetupSalvarRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'nome' => 'required',
            'documento' => 'required',
            'endereco.cep' => 'required',
            'endereco.logradouro' => 'required',
            'endereco.numero' => 'required',
            'endereco.bairro' => 'required',
            'endereco.cidade_id' => 'required|exists:cidades,id',
            'contato.responsavel' => 'required',
            'contato.email' => 'email'
        ];
    }

}
