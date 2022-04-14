<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Practice;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index(Practice $practice){
        //practice nav elemements
        $photos = $practice->photos;
        $videos = $practice->videos;
        $subject = $practice->subject;
        $applicant = $practice->applicant;
        $building = $practice->building;

        //initializing contracts array
        $contracts = [];

        //verify if records are present on db
        if($practice->contracts != null){
            // assign the records to the array
            $contracts = $practice->contracts;
        }

        return view('business.contract.index', compact('practice','applicant','building', 'subject','videos','photos','contracts'));
    }
}
