<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Practice;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Practice $practice){
         //relation value
         $photos = $practice->photos;
         $videos = $practice->videos;
         $subject = $practice->subject;
         $applicant = $practice->applicant;
         $building = $practice->building;
         
         return view ('pages.media.index', compact('practice', 'photos','videos', 'applicant', 'building', 'subject'));
    }

}
