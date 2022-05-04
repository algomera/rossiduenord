<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Applicant;
use App\Practice;
use App\Http\Resources\PracticeResource;
class ApiController extends Controller
{

    public function login(Request $request)
    {
        /**Read the credentials passed by the user
        */
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        /**Check the credentials are valid or not
        */
        if( auth()->attempt($credentials) ){
            $success['token'] = auth()->user()->createToken('App')->accessToken;
            return response()->json(['token' => $success['token']], 200);

        } else {
            /**Return error message
            */
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function getPracticeList()
    {

        $applicants = Applicant::where('user_id', auth()->id())->pluck('id');
        $practices = Practice::query()->whereIn('applicant_id', $applicants)->get();

        return  PracticeResource::collection($practices);

    }
}
