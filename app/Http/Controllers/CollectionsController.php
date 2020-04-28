<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        return RespController::returnData(CollectionsModel::selectCollections());
    }

    public function create(Request $request) {
        if ($this->validator($request->all())->fails()) {
            return response([
                'status' => false,
                'message' => 'Os dados forneciados não passaram pela validação!'
            ], 400);
        }

        return RespController::returnId(CollectionsModel::create($request->all()));
    }

    public function update(Request $request, $collectionID) {
        if ($this->validator($request->all())->fails()) {
            return response([
                'status' => false,
                'message' => 'Os dados forneciados não passaram pela validação!'
            ], 400);
        }

        return RespController::affected(CollectionsModel::up($collectionID, $request->all()));
    }

    public function delete($collectionID) {
        return RespController::affected(CollectionsModel::remove($collectionID));
    }
}
