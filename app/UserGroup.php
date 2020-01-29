<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $table = 'user_groups';

    protected $fillable = [
        'id', 'name'
    ];

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->hasMany('App\User', 'fk_user_group_id');
    }
}
