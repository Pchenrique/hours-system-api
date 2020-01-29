<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityGroup extends Model
{
    protected $table = 'activity_groups';

    protected $fillable = [
        'id', 'name', 'drescription', 'amount_hours', 'fk_course_id'
    ];

    protected $dates = ['deleted_at'];

    public function course()
    {
        return $this->belongsTo('App\Course', 'fk_course_id');
    }

    public function activity(){
        return $this->hasMany('App\Activity', 'fk_activity_group_id');
    }

}
