<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condomini extends Model
{
    protected $guarded = [];

    public function practice() {
        return $this->belongsTo(Practice::class);
    }

    public function condensing_boilers() {
        return $this->hasMany(CondensingBoiler::class, 'condomino_id', 'id');
    }

    public function heat_pumps() {
        return $this->hasMany(HeatPump::class, 'condomino_id', 'id');
    }

    public function absorption_heat_pumps() {
        return $this->hasMany(AbsorptionHeatPump::class, 'condomino_id', 'id');
    }

    public function hybrid_systems() {
        return $this->hasMany(HybridSystem::class, 'condomino_id', 'id');
    }

    public function microgeneration_systems() {
        return $this->hasMany(MicrogenerationSystem::class, 'condomino_id', 'id');
    }

    public function water_heatpumps_installations() {
        return $this->hasMany(WaterHeatpumpsInstallation::class, 'condomino_id', 'id');
    }

    public function biome_generators() {
        return $this->hasMany(BiomeGenerator::class, 'condomino_id', 'id');
    }

    public function solar_panels() {
        return $this->hasMany(SolarPanel::class, 'condomino_id', 'id');
    }
}
