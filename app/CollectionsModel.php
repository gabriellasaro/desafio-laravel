<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectionsModel extends Model {

    public static function selectProduction() {
        $result = GenericModel::selectEqualCondition('collection', date("Y-m-d"), '*', 'release_date', '<=');
        if ($result[0] && sizeof($result[1])!=0) {
            return $result;
        }
        
        $min = GenericModel::selectMin('collection', 'release_date');
        
        if ($min[0] && !empty($min[1])) {
            return GenericModel::selectEqualCondition('collection', $min[1], '*', 'release_date');
        }
        return [false, []];
    }

}
