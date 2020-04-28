<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CollectionsModel extends Model {

    public static function selectCollection($collectionID) {
        try {
            return [true, DB::table('collection')
            ->select('collection.name', 'collection.description', 'collection.release_date')
            ->where('id', $collectionID)
            ->get()];
        } catch(\Illuminate\Database\QueryException $ex) {
            return [false];
        }
    }

    public static function selectCollections($select = '*') {
        try {
            return [true, DB::table('collection')->select($select)->get()];
        } catch(\Illuminate\Database\QueryException $ex) {
            return [false];
        }
    }
    
}
