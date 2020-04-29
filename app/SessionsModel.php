<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\GenericModel;

class SessionsModel extends Model {

    public static function exists($token) {
        try {
            return DB::table('session')->where('id', $token)->exists();
        } catch(\Illuminate\Database\QueryException $ex) {
            return false;
        }
    }

    public static function create($data) {
        $user = GenericModel::selectEqualCondition('user', $data['cnpj'], ['id', 'name', 'company', 'cnpj', 'pass', 'responsible'], 'cnpj');
        if (!$user[0]) {
            return [false];
        } elseif(sizeof($user[1])!=0) {
            if (!Hash::check($data['pass'], $user[1][0]->pass)) {
                return [true, [
                    'auth' => false
                    ]
                ];
            }

            try {
                $token = hash('sha256', rand());

                $result = DB::table('session')->insert([
                    'id' => $token,
                    'user_id' => '1',
                    'register' => time(),
                ]);

                if ($result) {
                    unset($user[1][0]->pass);
                    return [true, [
                        'auth' => true,
                        'user' => $user[1][0],
                        'token' => $token,
                        ]
                    ];
                }
                return [false];
            } catch(\Illuminate\Database\QueryException $ex) {
                return [false];
            }
        }
        return [true, []];
    }
}
