<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProcessesModel extends Model {

    public static function getUserProcessesFromCollection($userID, $collectionID) {
        try {
            return [true, DB::table('process')
            ->join('model', 'process.model_id', '=', 'model.id')
            ->where('model.collection_id', '=', $collectionID)
            ->where('process.user_id', '=', $userID)
            ->select('process.id', 'process.quant', 'model.name', 'model.description')
            ->get()];
        } catch(\Illuminate\Database\QueryException $ex) {
            return [false];
        }
    }

    public static function createProcesses($modelID) {
        $tasks = GenericModel::selectAll('task');

        if ($tasks[0]) {
            for ($i=0; $i < sizeof($tasks[1]); $i++) {
                try {
                    $users = [true, DB::table('user')->select(['id', 'task_id'])->where('task_id', $tasks[1][$i]->id)->get()];
                } catch(\Illuminate\Database\QueryException $ex) {
                    return [false];
                }

                if ($users[0]) {
                    for ($y=0; $y < sizeof($users[1]); $y++) { 
                        DB::table('process')->insert([
                            'task_id' => $users[1][$y]->task_id,
                            'user_id' => $users[1][$y]->id,
                            'model_id' => $modelID
                        ]);
                    }
                }
            }
            return true;
        }
        return false;
    }
}