<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\GenericModel;
use App\TasksModel;
use App\ProcessesModel;
use App\Http\Controllers\RespController;

class UsersController extends Controller {

    public function getAll() {
        return RespController::returnData(GenericModel::selectAll('user', ['name', 'company', 'cnpj', 'phone', 'responsible', 'task_id']));
    }

    public function getTask($userID) {
        return RespController::returnData(TasksModel::selectUserTask($userID));
    }

    public function getProcesses($userID, $collectionID) {
        return RespController::returnData(ProcessesModel::getUserProcessesFromCollection($userID, $collectionID));
    }

    public function getUser($userID) {
        return RespController::returnData(GenericModel::selectEqualCondition('user', $userID, ['name', 'company', 'cnpj', 'address', 'phone', 'responsible', 'register', 'task_id']));
    }

    public function create(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:250',
            'company' => 'required|string|min:3|max:250',
            'cnpj' => 'required|cnpj|unique:user', // "unique" verifica na tabela se o valor x na coluna cnpj é único
            'pass' => 'required|string|min:8|max:250',
            'address' => 'required|string|min:3|max:600',
            'phone' => 'required|string|min:9|max:20',
            'responsible' => 'required|string|min:3|max:100',
            'task_id' => 'required|integer|min:0|max:999999|exists:task,id'
        ]);
        
        if ($validator->fails()) {
            return RespController::valFails();
        }

        $data = $request->all();
        $data['pass'] = Hash::make($data['pass']);
        $data['register'] = time();
        
        return RespController::returnId(GenericModel::create('user', $data));
    }

}
