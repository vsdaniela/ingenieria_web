<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
class FileUpload extends Controller
{
    public function createForm(){
        return view('files.file-upload');
    }
    
    public function fileUpload(Request $req){
            $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,png,jpge|max:2048'
            ]);
            $fileModel = new File;
            if($req->file()) {
                $fileName = time().'_'.$req->file->getClientOriginalName();
                $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
                $fileModel->name = time().'_'.$req->file->getClientOriginalName();
                $fileModel->file_path = '/storage/files'. $filePath;
                $fileModel->save();
                return view('files.file-upload')->with('success','Se subio el archivo')
                ->with('file', $fileName);
            }
    }
}
