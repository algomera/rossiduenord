<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Modified;
use App\Policy;
use App\Practice;
use App\Signed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function policyDownload($id){
        $file = Policy::find($id);
        return Storage::download($file->path);
    }


    public function signedIndex(Policy $policy){
        //nav elements
        $practice = $policy->practice;
        $subject = $practice->subject;
        $applicant = $practice->applicant;
        $building = $practice->building;
        $photos = $practice->photos;
        $videos = $practice->videos;
        $contracts = $practice->contracts;
        //initial array
        $modifieds = [];
        // if we have records in the db
        if($policy->modifieds){
            $modifieds = $policy->modifieds;
        }


        return view('business.policies.signedIndex',compact('practice','subject','modifieds','applicant','building', 'photos', 'videos', 'contracts','policy'));
    }

    public function signedStore(Request $request, Policy $policy){
        if($request->hasFile('modified')){
            //saving file
            $file = $request->file('modified');
            // taking the extensione 
            $extension = $file->extension();
            //taking the full name
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            //creating the path
            $new_modified = [
                'policy_id' => $policy->id,
                'name' => $filename,
                'path' => ''
            ];

            //creazione record nel db 
            $modified = Modified::create($new_modified);
            $practice = $policy->practice;
            $path = $file->storeAs('practices/' . $practice->id . '/policies'. "/$policy->id".  '/signed' ."/$modified->id"  , $filename . '.' . $extension);
            $update = ['path' => $path];
            $modified->update($update);
        }
        
        return redirect()->route('business.policies.signed', $policy);
    }

    public function modifiedDownload($id){
        $file = Modified::find($id);
        return Storage::download($file->path);
    }

    public function deleteSigned(Modified $modified){
        //deleting the signe contract
        $policy = $modified->policy;
        $practice = $policy->practice;
        //finding the contract
        $modified = Modified::find($modified->id);
        // finding the file in the storage
        $files = Storage::deleteDirectory('practices/' . $practice->id . '/policies/'. $policy->id.  '/signed/' .$modified->id );
        // deleteing the file from the storage
        Storage::delete($files);
        // deleting the record in the db
        $modified->delete();
        return redirect()->route('business.policies.signed',compact('policy'));
    }
}
