<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\ModelsModel;

class ModelsController extends Controller {

    protected function validator($data) {
        return Validator::make($data, [
            'name' => 'required|string|min:3|max:250',
            'description' => 'required|string|min:3|max:250',
            'quant' => 'required|integer|min:1|max:999999',
            'img' => 'required|string|max:1000',
            'code' => 'required|string|min:6|max:6|unique:model'
        ]);
    }

    public function getAll($collectionID) {
        $result = ModelsModel::selectModels($collectionID);
        if (!$result[0]) {
            return response([
                'status' => false,
                'message' => 'Erro desconhecido ao obter dados.'
            ], 500);
        }

        if (sizeof($result[1])==0) {
            return response([
                'status' => false,
                'message' => 'A coleção não foi encontrada.'
            ], 404);
        }
        
        return [
            'status' => true,
            'message' => 'Sucesso.',
            'data' => $result[1]
        ];
    }

    public function create(Request $request, $collectionID) {
        if ($this->validator($request->all())->fails()) {
            return response([
                'status' => false,
                'message' => 'Os dados forneciados não passaram pela validação!'
            ], 400);
        }

        $data = $request->all();
        $data['collection_id'] = $collectionID;;

        $id = ModelsModel::create($data);
        if ($id<0) {
            return response([
                'status' => false,
                'message' => 'Erro desconhecido ao salvar informações.'
            ], 500);
        }
        
        return [
            'status' => true,
            'message' => 'Sucesso.',
            'id' => $id
        ];
    }
}
