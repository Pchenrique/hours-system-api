<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralAdministrator extends Model
{
    protected $table = 'general_administrators';

    protected $fillable = [
        'id', 'fk_user_id'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'fk_user_id');
    }
}
