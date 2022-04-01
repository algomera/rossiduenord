<?php

namespace App\Http\Controllers\Business;

use App\AbsorptionHeatPump;
use App\CondensingBoiler;
use App\HeatPump;
use App\Http\Controllers\Controller;

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
        $heat_pump = AbsorptionHeatPump::find($id);
        $heat_pump->delete();
    }
}
