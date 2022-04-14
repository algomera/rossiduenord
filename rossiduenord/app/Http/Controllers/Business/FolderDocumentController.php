<?php

namespace App\Http\Controllers\Business;

use App\{Practice,FolderDocument, Sub_folders, Document};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class FolderDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Practice $practice)
    {
        $applicant = $practice->applicant;
        $subject = $practice->subject;
        $building = $practice->building;
        $folder_documents = FolderDocument::where('practice_id', '=', $practice->id)->get();
        return view('business.folder_document.index', compact('practice','applicant','subject','building','folder_documents'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FolderDocument  $folder_Document
     * @return \Illuminate\Http\Response
     */
    public function show(Practice $practice, FolderDocument $folder_document, Sub_folders $sub_folders)
    {
        $applicant = $practice->applicant;
        $subject = $practice->subject;
        $building = $practice->building;
        $folder_documents = FolderDocument::where('practice_id', '=', $practice->id)->get();
        $folders = Sub_folders::where('practice_id', '=', $practice->id)->where('folder_type', '=', $folder_document->type)->orderBy('created_at', 'DESC')->get();
        $documents = Document::where('practice_id', '=', $practice->id)->orderBy('created_at', 'DESC')->get();
        return view('business.folder_document.show', compact('folder_document','practice','applicant','subject', 'building','folder_documents','documents', 'folders'));
    }

    public function show_document(Practice $practice, FolderDocument $folder_document, Sub_folders $sub_folders)
    {
        $applicant = $practice->applicant;
        $subject = $practice->subject;
        $building = $practice->building;
        $folder_documents = FolderDocument::where('practice_id', '=', $practice->id)->get();
        $folders = Sub_folders::where('practice_id', '=', $practice->id)->where('folder_type', '=', $folder_document->type)->orderBy('created_at', 'DESC')->get();
        $documents = Document::where('practice_id', '=', $practice->id)->where('sub_folder_id', '=', $sub_folders->id)->orderBy('created_at', 'DESC')->get();
        return view('business.folder_document.show', compact('folder_document','practice','applicant','subject', 'building','folder_documents','documents', 'folders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FolderDocument  $folder_Document
     * @return \Illuminate\Http\Response
     */
    public function edit(FolderDocument $folder_Document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FolderDocument  $folder_Document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FolderDocument $folder_Document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FolderDocument  $folder_Document
     * @return \Illuminate\Http\Response
     */
    public function destroy(FolderDocument $folder_Document)
    {
        //
    }
}
