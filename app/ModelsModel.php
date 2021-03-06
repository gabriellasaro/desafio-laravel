<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelsModel extends Model {

    public static function selectModels($collectionID) {
        $collection = GenericModel::selectEqualCondition('collection', $collectionID, ['collection.name', 'collection.description', 'collection.release_date']);

        if (!$collection[0]) {
            return [false];
        } elseif(sizeof($collection[1])!=0) {
            try {
                $models = DB::table('model')->where('collection_id', $collectionID)->get();
            } catch(\Illuminate\Database\QueryException $ex) {
                return [false];
            }

            for ($i=0; $i < sizeof($models); $i++) { 
                $models[$i]->finalized = 0;
                // Implementar a contagem.
            }

            return [true, [
                'collection' => $collection[1][0],
                'models' => $models
                ]
            ];
        }
        return [true, []];
    }
    
}
