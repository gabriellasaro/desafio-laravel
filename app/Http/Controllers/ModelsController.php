<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\ModelsModel;
use App\GenericModel;
use App\ProcessesModel;
use App\Http\Controllers\RespController;

class ModelsController extends Controller {

    public function getAll($collectionID) {
        return RespController::returnData(ModelsModel::selectModels($collectionID));
    }

    public function create(Request $request, $collectionID) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:250',
            'description' => 'required|string|min:3|max:250',
            'quant' => 'required|integer|min:1|max:999999999',
            'img' => 'required|string|max:1000',
            'code' => 'required|string|min:6|max:6|unique:model'
        ]);

        if ($validator->fails()) {return RespController::valFails();}

        $data = $request->all();
        $data['collection_id'] = $collectionID;

        $result = GenericModel::create('model', $data);

        // Implementar como event.
        if ($result > 0) {
            ProcessesModel::createProcesses($result);
        }

        return RespController::returnId($result);
    }

    public function update(Request $request, $modelID) {
        $validator = Validator::make($request->all(), [
            'name' => 'string|min:3|max:250',
            'description' => 'string|min:3|max:250',
            'quant' => 'integer|min:1|max:999999',
            'img' => 'string|max:1000',
            'code' => 'string|min:6|max:6|unique:model'
        ]);

        if ($validator->fails()) {return RespController::valFails();}

        return RespController::affected(GenericModel::up('model', $modelID, $request->all()));
    }

    public function delete($modelID) {
        return RespController::affected(GenericModel::remove('model', $modelID));
    }

}
