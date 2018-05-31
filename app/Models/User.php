<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Session\Store;
use Illuminate\Database\Eloquent\Collection;

class User extends Model
{

    protected $table = 'm_users';

    protected $guarded = ['id'];

    public function createNewUser(Store $session, Collection $temp_token) {

    }

    public function accounts() {
        return $this->hasMany('App\LinkedSocialAccount');
    }

}
