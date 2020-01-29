<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $table = 'institutions';

    protected $fillable = [
        'id', 'name'
    ];

    protected $dates = ['deleted_at'];

    public function coordinator(){
        return $this->hasMany('App\Coordinator', 'fk_institution_id');
    }

    public function course(){
        return $this->hasMany('App\Course', 'fk_institution_id');
    }

    public function student(){
        return $this->hasMany('App\Student', 'fk_institution_id');
    }

    public function institutionAdministrator(){
        return $this->hasMany('App\InstitutionAdministrator', 'fk_institution_id');
    }

}
