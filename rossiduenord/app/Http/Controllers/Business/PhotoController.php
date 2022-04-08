<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index(){
        return view ('business.photo.index');
    }
}
