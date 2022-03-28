<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    protected $fillable = [
        'applicant_id',
        'import',
        'practical_phase',
        'real_estate_type',
        'month',
        'year',
        'policy_name',
        'address',
        'civic',
        'common',
        'province',
        'region',
        'cap',
        'work_start',
        'c_m',
        'assev_tecnica',
        'nominative',
        'lastName',
        'name',
        'policy',
        'request_policy',
        'referent_email',
        'description',
        'bonus',
        'note',
        'practice_ok',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function subject(){
        return $this->hasOne(Subject::class);
    }

    public function building(){
        return $this->hasOne(Building::class);
    }

    public function data_project(){
        return $this->hasOne(Data_project::class);
    }

    public function verical_wall() {
        return $this->hasOne(VerticalWall::class);
    }

    public function trainated_vert_wall() {
        return $this->hasOne(TrainatedVertWall::class);
    }
}
