<?php namespace Laraerp\Http\Requests;

class VendaItemAdicionarRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'venda_id' => 'required',
            'produtos' => 'required'
        ];

        $produtos = $this->get('produtos');

        if(!is_null($produtos)) {
            foreach ($produtos as $id) {
                $rules = array_merge($rules, ['quantidades.' . $id => 'required']);
                $rules = array_merge($rules, ['unidades_medida.' . $id => 'required']);
                $rules = array_merge($rules, ['valores_unitario.' . $id => 'required']);
            }
        }

        return $rules;
    }


}
