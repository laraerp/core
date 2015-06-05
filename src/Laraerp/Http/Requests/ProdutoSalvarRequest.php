<?php namespace Laraerp\Http\Requests;

class ProdutoSalvarRequest extends Request {

    /**
     * The URI to redirect to if validation fails
     *
     * @var string
     */
    protected $redirect = 'produto/form';


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'codigo' => 'required',
            'descricao' => 'required',
            'unidade_id' => 'required'
        ];
    }

}
