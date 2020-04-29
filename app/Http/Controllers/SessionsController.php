<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\RespController;
use App\SessionsModel;
use App\GenericModel;

class SessionsController extends Controller {

    public static function noToken() {
        return response([
            'status' => false,
            'message' => 'Não autenticado!'
        ], 401);
    }

    public static function checkToken($token) {
        return SessionsModel::exists($token);
    }

    public static function newToken($currentToken) {
        $token = hash('sha256', rand());

        if (GenericModel::up('session', $currentToken, ['id' => $token, 'last_change' => time()])!=1) {
            return $currentToken;
        }
        return $token;
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'cnpj' => 'required|cnpj',
            'pass' => 'required|string|min:8|max:250'
        ]);

        if ($validator->fails()) { return RespController::valFails(); }


        return RespController::returnData(SessionsModel::create($request->all()));
    }

    public function logout(Request $request) {
        return RespController::affected(GenericModel::remove('session', $request->headers->get('Meu-Token')));
    }
}
