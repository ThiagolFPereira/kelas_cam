<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function store(Request $request)
    {
    $file = $request->file('file');
    $file = $file->getClientOriginalName();

    $arr = [
        "data_upload" => now(),
        "file" => $file
    ];

    // Get filename with the extension
    $filenameWithExt = $file;
    // Get just filename
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    // Get just ext
    $extension = $request->file('file')->getClientOriginalExtension();
    // Filename to store
    $fileNameToStore= $filename.'_'.time().'.'.$extension;
    // Upload Image
    $path = $request->file('file')->storeAs('public/videos', $fileNameToStore);

    Media::create($arr);
    return response()->json([
        'status' => true,
        'messege' => 'Media Salva com Sucesso!'
    ]);
    }
}
