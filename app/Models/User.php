<?php

namespace App\Models;
//use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Session\Store;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $table = 'users';

    protected $guarded = ['id'];

    public function createNewUser(Store $session, Collection $temp_token) {

    }

    public function accounts() {
        return $this->hasMany('App\Models\LinkedSocialAccount');
    }

}
