<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Practice;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function index(Practice $practice){
        // practice nav elements
        $subject = $practice->subject;
        $applicant = $practice->applicant;
        $building = $practice->building;
        $photos = $practice->photos;
        $videos = $practice->videos;
        $contracts = $practice->contracts;
        $policies = $practice->policies;

        return view('business.policies.index', compact('subject','applicant','building','photos','videos','contracts','policies','practice'));
    }
}
