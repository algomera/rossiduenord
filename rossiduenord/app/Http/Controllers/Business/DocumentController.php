<?php

namespace App\Http\Controllers\Business;

use App\Document;
use App\FolderDocument;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'folder_id' => 'required | integer',
            'role' => 'nullable | string',
            'allega' => 'nullable',
            'status' => 'nullable',
            'description' => 'nullable',
            'note' => 'nullable',
            'type' => 'Nullable',
        ]);

        $folders = FolderDocument::all()->pluck('id');

        if (array_key_exists('allega', $validated)) {
            if(in_array($validated['folder_id'], $folders->toArray())){
                $business_document = Storage::put('business_folders/first_document_request', $validated['allega']);
            }
            if(in_array($validated['folder_id'], $folders->toArray())){
                $business_document = Storage::put('business_folders/during_document_request', $validated['allega']);
            }
            if(in_array($validated['folder_id'], $folders->toArray())){
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
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        $practice = $document->folder->practice;
        $applicant = $practice->applicant;
        $subject = $practice->subject;
        $building = $practice->building;
        $folders = FolderDocument::where('practice_id', '=', $practice->id)->get();
        $documents = Document::where('folder_id', '=', $document->id)->orderBy('created_at', 'DESC')->get();
        //dd($documents);
        return view('business.folder_document.show', compact('document','documents','practice','applicant','subject', 'building','folders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();
        return redirect()->back()->with('message', "Il documento e stato eliminato!");
    }
}
