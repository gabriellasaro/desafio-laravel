<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\GenericModel;
use App\TasksModel;
use App\Http\Controllers\RespController;

class TasksController extends Controller {

    public function getAll() {
        return RespController::returnData(GenericModel::selectAll('task'));
    }

    public function getUsers($taskID) {
        return RespController::returnData(TasksModel::selectUsers($taskID));
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:120',
            'description' => 'required|string|min:3|max:250',
            'average_time' => 'required|numeric|min:0',
            'cost' => 'required|numeric|min:0'
        ]);
        if ($validator->fails()) {return RespController::valFails();}

        return RespController::returnId(GenericModel::create('task', $request->all()));
    }
}
