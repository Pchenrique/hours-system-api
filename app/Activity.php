<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = [
        'id', 'name', 'descripition', 'quantity_ hours', 'path_file', 'fk_status_activity_id', 'fk_student_id', 'fk_activity_group_id'
    ];

    protected $dates = ['deleted_at'];

    public function activityGroup()
    {
        return $this->belongsTo('App\ActivityGroup', 'fk_activity_group_id');
    }

    public function statusActivity()
    {
        return $this->belongsTo('App\StatusActivity', 'fk_status_activity_id');
    }

}
