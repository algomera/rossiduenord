<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{Anagrafica, Applicant, Practice, Photo, User, Video};
use App\Http\Resources\AnagraficheResource;
use App\Http\Resources\PhotoResource;
use App\Http\Resources\PracticeResource;
use Illuminate\Support\Facades\Log;

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

    public function get_photo()
    {
        $user = Auth::user()->id;
        $practice = Practice::where('user_id', $user)->pluck('id');
        $photos = Photo::where('practice_id', $practice)->get(); 
        
        return PhotoResource::collection($photos);
    }

    public function create_photo(Request $request) 
    {
        $validated = $request->validate([
            'practice_id' => 'required',
            'name' => 'required|string',
            'image' => 'required|image',
            'description' => 'nullable',
            'reference' => 'nullable',
            'position' => 'nullable'
        ]);

        $extension = $request->file('image')->extension();
        $pathFile = $request->file('image')->storeAs('practices/' . $validated['practice_id'] . '/images' , $request->name . '.' .  $extension);
        $validated['image'] = $pathFile;
        Photo::create($validated);

        return response('Upload photo success!');
    }

    public function get_video()
    {
        $user = Auth::user()->id;
        $practice = Practice::where('user_id', $user)->pluck('id');
        $videos = Video::where('practice_id', $practice)->get(); 
        
        return response()->json([
            'status' => 200,
            'video' => $videos
        ], 200);
    }

    public function create_video(Request $request)
    {
        $validated = $request->validate([
            'practice_id' => 'required',
            'name' => 'required|string',
            'video' => 'required|mimes:mp4,avi',
            'description' => 'nullable',
            'reference' => 'nullable',
            'inspection_date' => 'nullable'
        ]);

        $extension = $request->file('video')->extension();
        $pathFile = $request->file('video')->storeAs('practices/' . $validated['practice_id'] . '/videos' , $request->name . '.' .  $extension);
        $validated['video'] = $pathFile;
        Video::create($validated);

        return response('Upload video success!');
    }

    public function get_anagrafiche()
    {
        $user = Auth::user()->id;
        $anagrafiche = Anagrafica::where('user_id', $user)->get(); 
        return AnagraficheResource::collection($anagrafiche);
    }
}
