<?php

namespace App\Http\Controllers\Business;

use App\{Practice,Folder_Document, Document};
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
        $folder_Documents = Folder_Document::where('practice_id', '=', $practice->id)->get();
        return view('business.folder_document.index', compact('practice','applicant','subject','building','folder_Documents'));
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
     * @param  \App\Folder_Document  $folder_Document
     * @return \Illuminate\Http\Response
     */
    public function show(Practice $practice, Folder_Document $folder_Document)
    {
        $applicant = $practice->applicant;
        $subject = $practice->subject;
        $building = $practice->building;
        $folder_Documents = Folder_Document::where('practice_id', '=', $practice->id)->get();
        $documents = Document::where('folder_id', '=', $folder_Document->id)->orderBy('created_at', 'DESC')->get();
        //dd($folder_Document->id);
        return view('business.folder_document.show', compact('folder_Document','practice','applicant','subject', 'building','folder_Documents','documents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Folder_Document  $folder_Document
     * @return \Illuminate\Http\Response
     */
    public function edit(Folder_Document $folder_Document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Folder_Document  $folder_Document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Folder_Document $folder_Document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Folder_Document  $folder_Document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folder_Document $folder_Document)
    {
        //
    }
}
