<?php

namespace Laraerp\Http\Controllers;

use Illuminate\Http\Request;
use JansenFelipe\NFePHPSerialize\NFePHPSerialize;
use Laraerp\Http\Requests\NotaFiscalUploadRequest;

class NotaFiscalController extends MainController {


    public function upload(NotaFiscalUploadRequest $request) {

        $file = $request->file('file');

$xml = file_get_contents($file->getRealPath());

        $nfeProc = NFePHPSerialize::xml2Object($xml);

        dd($nfeProc);




        $path = base_path().'/storage/nfes/'.date('Y-m');

        if(!is_dir($path))
            mkdir($path);

        $file->move($path, date('YmdHisu').'.xml');
    }

}
