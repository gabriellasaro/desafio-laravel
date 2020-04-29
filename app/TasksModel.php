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
                $users = DB::table('user')->where('task_id', $taskID)->get();
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

}
