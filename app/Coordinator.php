<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinator extends Model
{
    protected $table = 'coordinators';

    protected $fillable = [
        'id', 'fk_user_id', 'fk_institution_id'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'fk_user_id');
    }

    public function institution()
    {
        return $this->belongsTo('App\Institution', 'fk_institution_id');
    }

    public function course()
    {
        return $this->belongsTo('App\Course', 'fk_coordinator_id');
    }

    
}
