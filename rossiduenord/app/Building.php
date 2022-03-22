<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    //fillable items
    protected $fillable=[
        'practice_id',
        'intervention_name',
        'company_role',
        'intervention_tipology',
        'build_address',
        'build_civic_number',
        'common',
        'province',
        'region',
        'cap',
        'fiscal_code',
        'iban',
        'build_type',
        'zone',
        'section',
        'foil',
        'particle',
        'subaltern',
        'unit_builidg_number',
        'pertinence_number',
        'resolution_stairs',
        'note',
        'cultural_constraints',
        'denied_intervents',
        'mountain_common',
        'infringment_common',
        'sismic_events_zone',
        'isUnderRenovation',
        'nonMetan_area',
        'building_authorization',
        'license_number',
        'license_date',
        'construction_date',
        'administrator_fullname',
        'administrator_surname',
        'administrator_name',
        'administrator_fiscalcode',
        'administrator_address',
        'administrator_city',
        'administrator_province',
        'administrator_cap',
        'administrator_telephone',
        'administrator_cellphone',
        'administrator_email'
    ];

    //todo     relations
    public function practice(){
        return $this->belongsTo(Practice::class);
    }
}
