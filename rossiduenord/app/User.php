<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'referent', 'referent_phone', 'name', 'email', 'password', 'role', 'created_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute() {
        return $this->user_data->name;
    }

    public function getCreatedByAttribute() {
        $user = User::find($this->user_data->created_by);
        return $user->name;
    }

    public function getRoleAttribute() {
        return $this->getRoleNames()->first();
    }

    public function user_data() {
        return $this->hasOne(UserData::class);
    }

    public function applicant()
    {
        return $this->hasMany(Applicant::class);
    }

    public function anagrafiche() {
        return $this->hasMany(Anagrafica::class);
    }
}
