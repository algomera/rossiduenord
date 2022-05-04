<?php

namespace App\Http\Controllers\Admin;

use App\File;
use App\Folder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(File $file)
    {
        $folders = Folder::all();
        return view('admin.file_storage.create', compact('folders', 'file'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Folder $folder)
    {
        $validated = $request->validate([
            'title' => 'required | string',
            'folder_id' => 'required | integer | exists:folders,id',
            'file' => 'required',
        ]);
        
        $extension = $request->file('file')->extension();
        $filename = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME);
        $folders = Folder::all()->pluck('id');

        if (array_key_exists('file', $validated)) {
            if(in_array($validated['folder_id'], $folders->toArray())){
                $admin_document = $request->file('file')->storeAs('folder/' . 'admin_folders/' . $validated['title'] . '/' , $filename . '.' . $extension);
            }
            $validated['file'] = $admin_document;
        }

        File::create($validated);
        return redirect()->route('admin.folder.index')->with('message', "Nuovo file inserito!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return view('admin.file_storage.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        $folders = Folder::all();
        return view('admin.file_storage.edit', compact('file', 'folders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $validated = $request->validate([
            'title' => 'nullable | string',
            'folder_id' => 'nullable | integer | exists:folders,id',
            'file' => 'nullable',
        ]);

        if (array_key_exists('file', $validated)) {
            Storage::delete($file->file);
            $admin_file = Storage::put('admin_file', $validated['file']);
            $validated['file'] = $admin_file;
        }

        $file->update($validated);
        $folder = $validated['folder_id'];
        return redirect()->route('admin.folder.show', compact('folder'))->with('message', "file modificato!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();
        return redirect()->back()->with('message', "Il file e stato eliminato!");
    }
}
