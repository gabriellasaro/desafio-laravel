<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersModel extends Model {

    public static function selectUser($userID, $select = '*', $where = 'id') {
        try {
            return [true, DB::table('user')->select($select)->where($where, $userID)->get()];
        } catch(\Illuminate\Database\QueryException $ex) {
            return [false];
        }
    }
    
}
