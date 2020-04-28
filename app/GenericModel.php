<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GenericModel extends Model {

    public static function create($table, $data) {
        try {
            return DB::table($table)->insertGetId($data);
        } catch(\Illuminate\Database\QueryException $ex) {
            return -1;
        }
    }

    public static function up($table, $id, $data) {
        try {
            return DB::table($table)->where('id', $id)->update($data);
        } catch(\Illuminate\Database\QueryException $ex) {
            return -1;
        }
    }

    public static function remove($table, $id) {
        try {
            return DB::table($table)->where('id', $id)->delete();
        } catch(\Illuminate\Database\QueryException $ex) {
            return -1;
        }
    }

}
