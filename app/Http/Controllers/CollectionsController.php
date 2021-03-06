<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\GenericModel;
use App\CollectionsModel;
use App\Http\Controllers\RespController;

class CollectionsController extends Controller {

    protected function validator($data) {
        return Validator::make($data, [
            'name' => 'required|string|min:3|max:250',
            'description' => 'required|string|min:3|max:250',
            'release_date' => 'required|date'
        ]);
    }

    public function getAll() {
        return RespController::returnData(GenericModel::selectAll('collection'));
    }

    public function production() {
        return RespController::returnData(CollectionsModel::selectProduction());
    }

    public function create(Request $request) {
        if ($this->validator($request->all())->fails()) {
            return RespController::valFails();
        }

        return RespController::returnId(GenericModel::create('collection', $request->all()));
    }

    public function update(Request $request, $collectionID) {
        if ($this->validator($request->all())->fails()) {
            return RespController::valFails();
        }

        return RespController::affected(GenericModel::up('collection', $collectionID, $request->all()));
    }

    public function delete($collectionID) {
        GenericModel::remove('model', $collectionID, 'collection_id');
        return RespController::affected(GenericModel::remove('collection', $collectionID));
    }
}
