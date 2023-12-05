<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\images;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('file-upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file'=>'required|mimes:jpg,png|max:2048',
        ]);

        $filename = time().'.'.$request->file->extension();
        // $request->file->move(public_path('file'),$filename);
        $request->file->storeAs('file', $filename, 'public');

        images::create(['name'=>$filename]);

        return response()->json('file uploaded successfully');
    }
}