<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusActivity extends Model
{
    protected $table = 'status_activities';

    protected $fillable = [
        'id', 'name'
    ];

    protected $dates = ['deleted_at'];

    public function activity(){
        return $this->hasMany('App\Acticity', 'fk_status_activity_id');
    }
}
