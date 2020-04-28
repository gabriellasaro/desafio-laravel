<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\UsersModel;

class UsersController extends Controller {

    public function getUser($userID) {
        $result = UsersModel::selectUser($userID, ['name', 'company', 'cnpj', 'phone', 'responsible']);
        
        if (sizeof($result)==0) {
            return response([
                'status' => false,
                'message' => 'Usuário não encontrado.'
            ], 404);
        }

        return array(
            'status'=>true,
            'data'=>$result
        );
    }

    public function create(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:250',
            'company' => 'required|string|min:3|max:250',
            'cnpj' => 'required|cnpj|unique:user', // "unique" verifica na tabela se o valor x na coluna cnpj é único
            'pass' => 'required|string|min:8|max:250',
            'address' => 'required|string|min:3|max:600',
            'phone' => 'required|string|min:9|max:20',
            'responsible' => 'required|string|min:3|max:100'
        ]);
        
        if ($validator->fails()) {
            return response([
                'status' => false,
                'message' => 'Os dados forneciados não passaram pela validação!'
            ], 400);
        }

        $data = $request->all();
        $data['pass'] = Hash::make($data['pass']);
        $data['register'] = time();
        
        if (UsersModel::create($data)<0) {
            return response([
                'status' => false,
                'message' => 'Erro desconhecido ao salvar informações.'
            ], 500);
        }

        return [
            'status' => true,
            'message' => 'Usuário criado com sucesso!'
        ];
    }

}
