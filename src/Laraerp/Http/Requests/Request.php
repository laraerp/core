<?php namespace Laraerp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest {


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Check array is filled
     *
     * @return bool
     */
    protected function checkFilled($array){
        if(is_array($array))
            return in_array(true, array_map(function($x){return strlen($x)>0;}, $array));
        else
            return false;
    }

}
