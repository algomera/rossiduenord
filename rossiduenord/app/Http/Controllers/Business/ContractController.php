<?php

namespace App\Http\Controllers\Business;

use App\Contract;
use App\Http\Controllers\Controller;
use App\Practice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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


    public function store(Request $request, Practice $practice,Contract $contract){
        //verify the presence of the file
        if($request->hasFile('contract')){
            //saving file
            $file = $request->file('contract');
            // taking the extensione 
            $extension = $file->extension();
            //taking the full name
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            //creating the path
            $path = $file->storeAs('practices/' . $practice->id . '/contracts' .'/originals' , $filename . '.' . $extension);

            $new_contract = [
                'practice_id' => $practice->id,
                'name' => $filename,
                'path' => $path
            ];

            //creazione record nel db 
            Contract::create($new_contract);
        }
        return redirect()->route('business.contracts.index', $practice);
    }


    public function download($id,Contract $contract){
        $file = Contract::find($id);
        return Storage::download($file->path);

    }
}
