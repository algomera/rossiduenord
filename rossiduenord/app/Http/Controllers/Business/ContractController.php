<?php

namespace App\Http\Controllers\Business;

use App\Contract;
use App\Http\Controllers\Controller;
use App\Practice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContractController extends Controller
{
    public function originalIndex(Practice $practice){
        //practice nav elemements
        $photos = $practice->photos;
        $videos = $practice->videos;
        $subject = $practice->subject;
        $applicant = $practice->applicant;
        $building = $practice->building;

        //query contracts array
        $contracts = $practice->contracts;

        //verify if records are present on db
        if($contracts == null){
            // assign the records to the array
            $contracts = [];
        }

        return view('business.contract.originalIndex', compact('practice','applicant','building', 'subject','videos','photos','contracts'));
    }


    public function originalStore(Request $request, Practice $practice,Contract $contract){
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
                'path' => $path,
            ];

            //creazione record nel db 
            Contract::create($new_contract);
        }
        return redirect()->route('business.contracts.index', $practice);
    }

    //download the contract file
    public function download($id,Contract $contract){
        $file = Contract::find($id);
        return Storage::download($file->path);
    }

    public function show(Contract $contract){

        //elements
        $practice = $contract->practice;
        $photos = $practice->photos;
        $videos = $practice->videos;
        $subject = $practice->subject;
        $applicant = $practice->applicant;
        $building = $practice->building;

        //contracts
        $signeds = [];
        if($contract->signeds){
            $signeds = $contract->signeds;
        }

        return view('business.contract.signedIndex',compact('signeds','practice','applicant','building','subject','photos','videos'));
    }

    public function signedStore(Request $request,Contract $contract){
        //verify the presence of the file
        if($request->hasFile('contract')){
            //saving file
            $file = $request->file('contract');
            // taking the extensione 
            $extension = $file->extension();
            //taking the full name
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            //creating the path
            $practice = $contract->practice;
            $path = $file->storeAs('practices/' . $practice->id . '/contracts'. $contract->id .'/signed' , $filename . '.' . $extension);

            $new_signed = [
                'contract_id' => $contract->id,
                'name' => $filename,
                'path' => $path
            ];

            //creazione record nel db 
            Contract::create($new_signed);
        }
        return redirect()->route('business.contracts.show', $contract);
    }
}
