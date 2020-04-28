<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RespController extends Controller {

    public static function valFails() {
        return response([
            'status' => false,
            'message' => 'Os dados forneciados não passaram pela validação!'
        ], 400);
    }

    public static function affected($result) {
        if ($result==0) {
            return response([
                'status' => false,
                'message' => 'Nenhuma informação encontrada ou não havia nada a ser feito.'
            ], 404);
        } elseif ($result<0) {
            return response([
                'status' => false,
                'message' => 'Erro desconhecido.'
            ], 500);
        }

        return array(
            'status'=>true,
            'message'=> 'Sucesso.'
        );
    }

    public static function returnId($result) {
        if ($result<0) {
            return response([
                'status' => false,
                'message' => 'Erro desconhecido.'
            ], 500);
        }
        
        return [
            'status' => true,
            'message' => 'Sucesso.',
            'id' => $result
        ];
    }

    public static function returnData($result) {
        if (!$result[0]) {
            return response([
                'status' => false,
                'message' => 'Erro desconhecido ao obter dados.'
            ], 500);
        }

        if (sizeof($result[1])==0) {
            return response([
                'status' => false,
                'message' => 'Nada foi encontrada.'
            ], 404);
        }
        
        return [
            'status' => true,
            'message' => 'Sucesso.',
            'data' => $result[1]
        ];
    }

}
