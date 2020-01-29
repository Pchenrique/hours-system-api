<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'id', 'fk_status_student_id', 'fk_user_id', 'fk_institution_id', 'fk_course_id'
    ];

    protected $dates = ['deleted_at'];

    public function statusStudent(){
        return $this->belongsTo('App\StatusStudent', 'fk_status_student_id');
    }

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
        return $this->belongsTo('App\Course', 'fk_course_id');
    }

    public function activity(){
        return $this->hasMany('App\Activity', 'fk_student_id');
    }
}
