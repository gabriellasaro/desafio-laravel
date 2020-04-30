<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TasksModel extends Model {

    public static function selectUsers($taskID) {
        $task = GenericModel::selectEqualCondition('task', $taskID);

        if (!$task[0]) {
            return [false];
        } elseif(sizeof($task[1])!=0) {
            try {
                $users = DB::table('user')->select(['name', 'company', 'cnpj', 'address', 'phone', 'responsible'])->where('task_id', $taskID)->get();
            } catch(\Illuminate\Database\QueryException $ex) {
                return [false];
            }

            return [true, [
                'task' => $task[1][0],
                'users' => $users
                ]
            ];
        }
        return [true, []];
    }

    public static function selectUserTask($userID) {
        $user = GenericModel::selectEqualCondition('user', $userID, 'task_id');

        if (!$user[0]) {
            return [false];
        } elseif(sizeof($user[1])!=0) {
            try {
                return GenericModel::selectEqualCondition('task', $user[1][0]->task_id, ['name', 'description', 'average_time', 'cost']);
            } catch(\Illuminate\Database\QueryException $ex) {
                return [false];
            }
        }
        return [true, []];
    }

}
