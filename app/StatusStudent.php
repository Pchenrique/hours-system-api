<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusStudent extends Model
{
    protected $table = 'status_students';

    protected $fillable = [
        'id', 'name'
    ];

    protected $dates = ['deleted_at'];

    public function student(){
        return $this->hasMany('App\Student', 'fk_status_student_id');
    }
}
