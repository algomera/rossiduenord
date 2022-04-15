<?php

namespace App\Http\Controllers\Business;

use App\{Practice, FolderDocument, Sub_folder, Document};
use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'practice_id' => 'required | integer',
            'sub_folder_id' => 'required | integer',
            'allega' => 'required',
            'note' => 'nullable',
            'type' => 'Nullable',
        ]);

        $folders = Sub_folder::all()->pluck('id');

        if (array_key_exists('allega', $validated)) {
            if(in_array($validated['sub_folder_id'], $folders->toArray())){
                $business_document = Storage::put('business_folders/first_document_request', $validated['allega']);
            }
            if(in_array($validated['sub_folder_id'], $folders->toArray())){
                $business_document = Storage::put('business_folders/during_document_request', $validated['allega']);
            }
            if(in_array($validated['sub_folder_id'], $folders->toArray())){
                $business_document = Storage::put('business_folders/after_document_request', $validated['allega']);
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
    public function show(Practice $practice, FolderDocument $folder_document, Sub_folder $sub_folder, Document $document)
    {
        $applicant = $practice->applicant;
        $subject = $practice->subject;
        $building = $practice->building;
        $folder_documents = FolderDocument::where('practice_id', '=', $practice->id)->get();
        $sub_folders = Sub_folder::where('practice_id', '=', $practice->id)->where('folder_type', '=', $folder_document->type)->orderBy('created_at', 'DESC')->get();
        $documents = Document::where('practice_id', '=', $practice->id)->where('sub_folder_id', '=', $sub_folder->id)->get();
        return view('business.folder_document.show', compact('folder_document','practice','applicant','subject', 'building','folder_documents','document','documents', 'sub_folders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FolderDocument  $folder_Document
     * @return \Illuminate\Http\Response
     */
    public function show_document(Request $request, Practice $practice, FolderDocument $folder_document, Sub_folder $sub_folder, Document $document)
    {
        //dd($request->all());
        $applicant = $practice->applicant;
        $subject = $practice->subject;
        $building = $practice->building;
        $folder_documents = FolderDocument::where('practice_id', '=', $practice->id)->get();
        $sub_folders = Sub_folder::where('practice_id', '=', $practice->id)->where('folder_type', '=', $folder_document->type)->latest()->get();
        $documents = Document::where('practice_id', '=', $practice->id)->where('sub_folder_id', '=', $sub_folder->id)->get();
        //dd($folder_documents);
        //dd($practice->id, $folder_document->id, $sub_folder->id, $document->id);
        return view('business.folder_document.show', compact('folder_document','practice','applicant','subject', 'building','folder_documents','document', 'documents', 'sub_folders'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FolderDocument  $folder_Document
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();
        return redirect()->back()->with('message', "Il documento e stato eliminato!");
    }
}
