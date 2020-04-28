<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\CollectionsModel;

class ModelsModel extends Model {

    public static function selectModels($collectionID) {
        $collection = CollectionsModel::selectCollection($collectionID);

        if ($collection[0] && sizeof($collection[1])!=0) {
            try {
                $models = DB::table('model')->where('collection_id', $collectionID)->get();
            } catch(\Illuminate\Database\QueryException $ex) {
                return [false];
            }

            return [true, [
                'collection' => $collection[1][0],
                'models' => $models
                ]
            ];
        } elseif (sizeof($collection[1])==0) {
            return [true, []];
        }

        return [false];
    }

    public static function create($data) {
        try {
            return DB::table('model')->insertGetId($data);
        } catch(\Illuminate\Database\QueryException $ex) {
            return -1;
        }
    }

    public static function up($modelID, $data) {
        try {
            return DB::table('model')->where('id', $modelID)->update($data);
        } catch(\Illuminate\Database\QueryException $ex) {
            return -1;
        }
    }

    public static function remove($modelID) {
        try {
            return DB::table('model')->where('id', $modelID)->delete();
        } catch(\Illuminate\Database\QueryException $ex) {
            return -1;
        }
    }

}
