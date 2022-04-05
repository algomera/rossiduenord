<?php

namespace App\Http\Controllers\Business;

use App\{Practice, Subject, Applicant, Building, Folder_Document};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Folder_Document $folder_Document, Practice $practice, Subject $subject, Applicant $applicant, Building $building)
    {   
        $applicant = $practice->applicant;
        $subject = $practice->subject;
        $building = $practice->building;
        $folders = Folder_Document::where('practice_id', '=', $practice->id)->get();

        return view('business.document.index', compact('practice','applicant','subject','building','folders'));
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
    public function show(Folder_Document $folder_Document)
    {
        //
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
