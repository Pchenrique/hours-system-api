<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'id', 'name', 'additional_time', 'fk_institution_id', 'fk_course_id'
    ];

    protected $dates = ['deleted_at'];

    public function institution()
    {
        return $this->belongsTo('App\Institution', 'fk_institution_id');
    }

    public function coordinator()
    {
        return $this->hasOne('App\Coordinator', 'fk_coordinator_id');
    }

    public function student(){
        return $this->hasMany('App\Student', 'fk_course_id');
    }

    public function activityGroup(){
        return $this->hasMany('App\ActivityGroup', 'fk_course_id');
    }
}
