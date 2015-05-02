<?php

namespace Laraerp\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use JansenFelipe\CnpjGratis\CnpjGratis;
use JansenFelipe\CpfGratis\CpfGratis;
use JansenFelipe\Utils\Utils;

class PessoaController extends MainController {

    protected $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    /**
     * Efetua busca de parametros para consultar CPF/CNPJ no site da Receita
     *
     * @return Response
     */
    public function receitaParams() {
        $documento = $this->request->get('documento');

        if (Utils::isCnpj($documento)) {
            $params = CnpjGratis::getParams();
        } else if (Utils::isCpf($documento)) {
            $params = CpfGratis::getParams();
        } else
            return response()->json(array('code' => 1, 'message' => 'O documento não é válido'));

        unset($params['audio']);

        return response()->json(array('code' => 0, 'params' => $params));
    }

    /**
     * Efetua consulta de CPF/CNPJ no site da Receita
     *
     * @return Response
     */
    public function receitaConsulta() {
        $documento = $this->request->get('documento');
        $cookie = $this->request->get('cookie');
        $captcha = $this->request->get('captcha');

        try {
            if (Utils::isCnpj($documento)) {

                $params = CnpjGratis::consulta($documento, $captcha, $cookie);

                if(count($params)==0)
                    throw new Exception('Ocorreu um erro. Tente novamente.');

                if (isset($params['nome_fantasia']) && $params['nome_fantasia'] == '********')
                    $params['nome_fantasia'] = $params['razao_social'];
                return response()->json(array('code' => 0, 'params' => $params));

            } else if (Utils::isCpf($documento)) {
                return response()->json(array('code' => 1, 'params' => CpfGratis::consulta($documento, $captcha, $cookie)));
            } else
                return response()->json(array('code' => 98, 'message' => 'O documento não é válido'));
        } catch (Exception $e) {
            return response()->json(array('code' => 99, 'message' => $e->getMessage()));
        }
    }

}
