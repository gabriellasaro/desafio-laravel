<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\CollectionsModel;

class CollectionsController extends Controller {

    protected function validator($data) {
        return Validator::make($data, [
            'name' => 'required|string|min:3|max:250',
            'description' => 'required|string|min:3|max:250',
            'release_date' => 'required|date'
        ]);
    }

    public function getAll() {
        $result = CollectionsModel::selectCollections();
        if (!$result[0]) {
            return response([
                'status' => false,
                'message' => 'Erro desconhecido ao obter dados.'
            ], 500);
        }

        return array(
            'status' => true,
            'message' => 'Sucesso.',
            'data' => $result[1]
        );
    }

    public function create(Request $request) {
        if ($this->validator($request->all())->fails()) {
            return response([
                'status' => false,
                'message' => 'Os dados forneciados não passaram pela validação!'
            ], 400);
        }

        $result = CollectionsModel::create($request->all());

        if ($result<0) {
            return response([
                'status' => false,
                'message' => 'Erro desconhecido ao salvar informações.'
            ], 500);
        }

        return [
            'status' => true,
            'message' => 'Coleção criada com sucesso!',
            'collectionID' => $result
        ];
    }

    public function update(Request $request, $collectionID) {
        if ($this->validator($request->all())->fails()) {
            return response([
                'status' => false,
                'message' => 'Os dados forneciados não passaram pela validação!'
            ], 400);
        }

        $result = CollectionsModel::up($collectionID, $request->all());
        if ($result==0) {
            return response([
                'status' => false,
                'message' => 'Coleção não encontrada'
            ], 404);
        } elseif ($result<0) {
            return response([
                'status' => false,
                'message' => 'Erro desconhecido ao tentar atualizar dados.'
            ], 500);
        }

        return array(
            'status'=>true,
            'message'=> 'Sucesso ao atulizar.'
        );
    }

    public function delete($collectionID) {
        $result = CollectionsModel::remove($collectionID);
        if ($result==0) {
            return response([
                'status' => false,
                'message' => 'Coleção não encontrada.'
            ], 404);
        }

        return array(
            'status' => true,
            'message' => 'Sucesso ao deletar.'
        );
    }
}
