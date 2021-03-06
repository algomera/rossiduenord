<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Practice;
use App\Signed;
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

        return view('pages.contract.originalIndex', compact('practice','applicant','building', 'subject','videos','photos','contracts'));
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
        return redirect()->route('contracts.index', $practice);
    }

    //download the contract file
    public function contractDownload($id){
        $file = Contract::find($id);
        return Storage::download($file->path);
    }

    public function signedIndex(Contract $contract){

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

        return view('pages.contract.signedIndex',compact('signeds','practice','applicant','building','subject','photos','videos','contract'));
    }

    public function signedStore(Request $request,Contract $contract){
        //verify the presence of the file
        if($request->hasFile('signed')){
            //saving file
            $file = $request->file('signed');
            // taking the extensione 
            $extension = $file->extension();
            //taking the full name
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            //creating the path
            $new_signed = [
                'contract_id' => $contract->id,
                'name' => $filename,
                'path' => ''
            ];

            //creazione record nel db 
            $signed = Signed::create($new_signed);
            $practice = $contract->practice;
            $path = $file->storeAs('practices/' . $practice->id . '/contracts'. "/$contract->id".  '/signed' ."/$signed->id"  , $filename . '.' . $extension);
            $update = ['path' => $path];
            $signed->update($update);
        }
        
        return redirect()->route('signed.index', $contract);
    }


    public function signedShow(Signed $signed){
        return view('pages.contract.signedShow', compact('signed'));
    }

    public function signedDownload($id){
        $file = Signed::find($id);
        return Storage::download($file->path);
    }

    public function deleteSigned(Signed $signed){
        //deleting the signe contract
        $contract = $signed->contract;
        $practice = $contract->practice;
        //finding the contract
        $signed = Signed::find($signed->id);
        // finding the file in the storage
        $files = Storage::deleteDirectory('practices/' . $practice->id . '/contracts/'. $contract->id.  '/signed/' .$signed->id );
        // deleteing the file from the storage
        Storage::delete($files);
        // deleting the record in the db
        $signed->delete();
        return redirect()->route('signed.index',compact('contract'));
    }
}
