<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'id', 'name', 'email', 'registration', 'password', 'fk_user_group_id'
    ];

    protected $dates = ['deleted_at'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //metodos para relacionamentos
    public function userGroup(){
        return $this->belongsTo('App\UserGroup', 'fk_user_group_id');
    }

    public function coordinator()
    {
        return $this->hasOne('App\Coordinator', 'fk_user_id');
    }

    public function administrator()
    {
        return $this->hasOne('App\Administrator', 'fk_user_id');
    }

    public function student()
    {
        return $this->hasOne('App\Student', 'fk_user_id');
    }

    public function institutionAdministrator()
    {
        return $this->hasOne('App\InstitutionAdministrator', 'fk_user_id');
    }

    public function generalAdministrator()
    {
        return $this->hasOne('App\GerneralAdministrator', 'fk_user_id');
    }

    //metodos da autenticação
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function setPasswordAttribute($password)
    {
        if ( !empty($password) ) {
            $this->attributes['password'] = bcrypt($password);
        }
    }
}
