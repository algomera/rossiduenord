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

    public function user_data() {
        return $this->hasOne(UserData::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function asseverators()
    {
        return $this->hasMany(Asseverator::class);
    }

    public function banks()
    {
        return $this->hasMany(banks::class);
    }

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }

    public function collaborators()
    {
        return $this->hasMany(Collaborator::class);
    }

    public function condominia()
    {
        return $this->hasMany(Condominium::class);
    }

    public function consultants()
    {
        return $this->hasMany(Consultant::class);
    }

    public function finacials()
    {
        return $this->hasMany(Financial::class);
    }

    public function folders()
    {
        return $this->hasMany(Folders::class);
    }

    public function agents_lv_1()
    {
        return $this->hasMany(Lv1_agent::class);
    }

    public function agents_lv_2()
    {
        return $this->hasMany(Lv2_agent::class);
    }

    public function managers()
    {
        return $this->hasMany(Manager::class);
    }

    public function providers()
    {
        return $this->hasMany(Provider::class);
    }

    public function applicant()
    {
        return $this->hasMany(Applicant::class);
    }

    public function anagrafiche() {
        return $this->hasMany(Anagrafica::class);
    }
}
