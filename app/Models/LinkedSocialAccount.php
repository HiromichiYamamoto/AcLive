<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkedSocialAccount extends Model
{
    protected $table = 'linked_social_accounts';

    protected $primaryKey = 'id';

    protected $fillable = ['provider', 'user_id','provider_user_id','provider_access_token'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
