<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Practice;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index(Practice $practice){
        $photos = $practice->photos;
        $videos = $practice->videos;
        $subject = $practice->subject;
        $applicant = $practice->applicant;
        $building = $practice->building;
        $contracts = [];
        if($practice->contracts != null){
            $contracts = $practice->contracts;
        }

        return view('business.contract.index', compact('practice','applicant','building', 'subject','videos','photos','contracts'));
    }
}
