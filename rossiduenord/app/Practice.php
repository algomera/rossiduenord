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

    public function final_state() {
        return $this->hasOne(FinalState::class);
    }

    public function variant() {
        return $this->hasOne(Variant::class);
    }

    public function condomini() {
        return $this->hasMany(Condomini::class);
    }

    public function condensing_boilers() {
        return $this->hasMany(CondensingBoiler::class);
    }

    public function heat_pumps() {
        return $this->hasMany(HeatPump::class);
    }

    public function absorption_heat_pumps() {
        return $this->hasMany(AbsorptionHeatPump::class);
    }

    public function hybrid_systems() {
        return $this->hasMany(HybridSystem::class);
    }

    public function microgeneration_systems() {
        return $this->hasMany(MicrogenerationSystem::class);
    }

    public function water_heatpumps_installations() {
        return $this->hasMany(WaterHeatpumpsInstallation::class);
    }

    public function biome_generators() {
        return $this->hasMany(BiomeGenerator::class);
    }

    public function solar_panels() {
        return $this->hasMany(SolarPanel::class);
    }

    public function folder_documents()
    {
        return $this->hasMany(FolderDocument::class);
    }

    public function sub_folder()
    {
        return $this->hasMany(Sub_folder::class);
    }

    public function surfaces()
    {
        return $this->hasMany(Surface::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function videos(){
        return $this->hasMany(Video::class);
    }
}
