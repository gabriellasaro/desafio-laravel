<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GenericModel extends Model {

    public static function selectEqualCondition($table, $id, $select = '*', $where = 'id') {
        try {
            return [true, DB::table($table)->select($select)->where($where, $id)->get()];
        } catch(\Illuminate\Database\QueryException $ex) {
            return [false];
        }
    }

    public static function selectAll($table, $select = '*') {
        try {
            return [true, DB::table($table)->select($select)->get()];
        } catch(\Illuminate\Database\QueryException $ex) {
            return [false];
        }
    }
    
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

    public static function remove($table, $id, $where = 'id') {
        try {
            return DB::table($table)->where($where, $id)->delete();
        } catch(\Illuminate\Database\QueryException $ex) {
            return -1;
        }
    }

}
