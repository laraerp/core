<?php namespace Laraerp\Http\Requests;

class NotaFiscalUploadRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return ['file' => 'mimes:xml'];
    }

}
