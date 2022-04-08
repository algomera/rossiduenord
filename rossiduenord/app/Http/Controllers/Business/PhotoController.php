<?php

namespace App\Http\Controllers\Business;

use App\Applicant;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Practice;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index( Practice $practice){

        //relation value
        $photos = $practice->photos;
        $subject = $practice->subject;
        $applicant = $practice->applicant;
        $building = $practice->building;
        
        return view ('business.photo.index', compact('practice','photos', 'applicant', 'building', 'subject'));
    }
}
