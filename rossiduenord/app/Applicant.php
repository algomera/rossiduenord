<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Applicant extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'applicant',
        'name',
        'lastName',
        'c_f',
        'phone',
        'mobile_phone',
        'email',
        'role',
    ];

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function practice()
    {
        return $this->hasMany(Practice::class);
    }
}
