<?php

namespace App\Http\Controllers\Business;

use App\AbsorptionHeatPump;
use App\CondensingBoiler;
use App\HeatPump;
use App\Http\Controllers\Controller;
use App\HybridSystem;
use App\MicrogenerationSystem;

class InterventionController extends Controller
{
    public function deleteCondensingBoilers($id) {
        $condensingBoiler = CondensingBoiler::find($id);
        $condensingBoiler->delete();
    }

    public function deleteHeatPumps($id) {
        $heat_pump = HeatPump::find($id);
        $heat_pump->delete();
    }

    public function deleteAbsorptionHeatPumps($id) {
        $absorption_heat_pump = AbsorptionHeatPump::find($id);
        $absorption_heat_pump->delete();
    }

    public function deleteHybridSystems($id) {
        $hybrid_system = HybridSystem::find($id);
        $hybrid_system->delete();
    }

    public function deleteMicrogenerationSystems($id) {
        $microgeneration_system = MicrogenerationSystem::find($id);
        $microgeneration_system->delete();
    }
}
