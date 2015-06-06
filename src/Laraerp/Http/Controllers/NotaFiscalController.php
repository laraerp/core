<?php

namespace Laraerp\Http\Controllers;

use Illuminate\Http\Request;
use Laraerp\Http\Requests\NotaFiscalUploadRequest;

class NotaFiscalController extends MainController {


    public function upload(NotaFiscalUploadRequest $request) {

        $file = $request->file('file');

        dd($file->getRealPath());

        $path = base_path().'/storage/nfes/'.date('Y-m');

        if(!is_dir($path))
            mkdir($path);

        $file->move($path, date('YmdHisu').'.xml');
    }

}
