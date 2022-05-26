<?php

namespace App\Http\Controllers;

use App\{Document, FolderDocument, Practice, Sub_folder};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FolderDocumentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $validated = $request->validate([
            'practice_id' => 'required | integer',
            'sub_folder_id' => 'required | integer',
            'allega' => 'required',
            'note' => 'nullable',
            'type' => 'Nullable',
        ]);

        $extension = $request->file('allega')->extension();
        $filename = pathinfo($request->file('allega')->getClientOriginalName(), PATHINFO_FILENAME);
        $folders = Sub_folder::all()->pluck('id');
        $s_folder = Sub_folder::find($request->route('sub_folder'));

        if (array_key_exists('allega', $validated)) {
            if(in_array($validated['sub_folder_id'], $folders->toArray())){
                $business_document = $request->file('allega')->storeAs('practices/' . $validated['practice_id'] . '/business_folders/'. $s_folder->folder_type . '_document_request', $filename . '.' . $extension);
            }
            $validated['allega'] = $business_document;
        }

        Document::create($validated);
        return redirect()->back()->with('message', "Documento inserito!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FolderDocument  $folder_Document
     * @return \Illuminate\Http\Response
     */
//    public function show(Practice $practice, FolderDocument $folder_document, Sub_folder $sub_folder, Document $document)
//    {
//        $applicant = $practice->applicant;
//        $subject = $practice->subject;
//        $building = $practice->building;
//        $folder_documents = FolderDocument::where('practice_id', '=', $practice->id)->get();
//        $sub_folders = Sub_folder::where('practice_id', '=', $practice->id)->where('folder_type', '=', $folder_document->type)->orderBy('created_at', 'DESC')->get();
//        $documents = Document::where('practice_id', '=', $practice->id)->where('sub_folder_id', '=', $sub_folder->id)->get();
//        $id = Document::all()->pluck('sub_folder_id');
//
//        return view('pages.folder_document.show', compact('folder_document','practice','applicant','subject', 'building','folder_documents','document', 'sub_folders', 'id'));
//    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FolderDocument  $folder_Document
     * @return \Illuminate\Http\Response
     */
    public function show_document(Request $request, Practice $practice, FolderDocument $folder_document, Sub_folder $sub_folder, Document $document)
    {
//	    if ($sub_folder->assev_t_status == 0 && auth()->user()->role === 'technical_asseverator') {
//		    $sub_folder->assev_t_status = 1;
//		    $sub_folder->save();
//	    } else if ($sub_folder->assev_f_status == 0 && auth()->user()->role === 'fiscal_asseverator') {
//		    $sub_folder->assev_f_status = 1;
//		    $sub_folder->save();
//	    } else if ($sub_folder->bank_status == 0 && auth()->user()->role === 'bank') {
//		    $sub_folder->bank_status = 1;
//		    $sub_folder->save();
//	    }
        //element fro the view
//        $applicant = $practice->applicant;
//        $subject = $practice->subject;
//        $building = $practice->building;
//        $folder_documents = FolderDocument::where('practice_id', '=', $practice->id)->get();
//        $sub_folders = Sub_folder::where('practice_id', '=', $practice->id)->where('folder_type', '=', $folder_document->type)->latest()->get();
//        //taking the documents
//        $documents = Document::where('practice_id', '=', $practice->id)->where('sub_folder_id', '=', $sub_folder->id)->get();
//        $id = Document::all()->pluck('sub_folder_id')->toArray();
//	    $current_sub_folder = $sub_folder;
//        return view('pages.folder_document.show', compact('folder_document','practice','applicant','subject', 'building','folder_documents','document', 'documents', 'sub_folders', 'id', 'current_sub_folder'));
    }

//	public function approve_sub_folder(Practice $practice, FolderDocument $folder_document, Sub_folder $sub_folder) {
//		if ($sub_folder->assev_t_status == 1 && auth()->user()->role === 'technical_asseverator') {
//			$sub_folder->assev_t_status = 2;
//			$sub_folder->save();
//		} else if ($sub_folder->assev_f_status == 1 && auth()->user()->role === 'fiscal_asseverator') {
//			$sub_folder->assev_f_status = 2;
//			$sub_folder->save();
//		} else if ($sub_folder->bank_status == 1 && auth()->user()->role === 'bank') {
//			$sub_folder->bank_status = 2;
//			$sub_folder->save();
//		}
//
//		return redirect()->back();
//	}

//	public function disapprove_sub_folder(Practice $practice, FolderDocument $folder_document, Sub_folder $sub_folder) {
//		if ($sub_folder->assev_t_status == 2 && auth()->user()->role === 'technical_asseverator') {
//			$sub_folder->assev_t_status = 1;
//			$sub_folder->save();
//		} else if ($sub_folder->assev_f_status == 2 && auth()->user()->role === 'fiscal_asseverator') {
//			$sub_folder->assev_f_status = 1;
//			$sub_folder->save();
//		} else if ($sub_folder->bank_status == 2 && auth()->user()->role === 'bank') {
//			$sub_folder->bank_status = 1;
//			$sub_folder->save();
//		}
//
//		return redirect()->back();
//	}

//    public function downloadDocument($id){
//        $file = Document::find($id);
//        return Storage::download($file->allega);
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FolderDocument  $folder_Document
     * @return \Illuminate\Http\Response
     */
//    public function destroy($practice_id, $folder_document_id, $sub_folder_id,$document_id)
//    {
//        $document = Document::find($document_id);
//        Storage::delete($document->allega);
//        $document->delete();
//        return redirect()->back()->with('message', "Il documento e stato eliminato!");
//    }
}
