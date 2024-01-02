<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\TraitParserText;
use App\Http\Traits\TraitCombineText;
use Illuminate\Support\Facades\Storage;

class ParseText0101 extends Controller
{
    use TraitParserText, TraitCombineText;


    public function index() {
        return view('parse-text0101');
    }

    public function store(Request $req) {
        $req->validate([
            'file*' => 'required|mimes:txt,text|max:10240',
       ]);
       $fileUpload = $req->file('file');
       $urutan = 1;

       $semuaData = [];
       $namaUpload='';
       // Parsing file
       foreach ($fileUpload as $file) {
            $namaUpload = $file->getClientOriginalName();

            if (substr($namaUpload, 0, 15) != 'LBBPRK-0101-R-M') return response('Hanya mendukung file 0101 ', 406);
            $textParser = $this->parser101($file, $urutan);
            $semuaData[] = $textParser;
            $urutan++;
       }

       // Combine file.
       $new_content = $this->combine101($semuaData);
       Storage::put('public/tempParse101.txt' , $new_content);
       return $namaUpload;
    }

    public function download(Request $req) {
        if(isset($req->fileName)){
            if(Storage::exists('public/tempParse101.txt')){
                 return response()->download(storage_path('app/public/tempParse101.txt'),$req->fileName)->deleteFileAfterSend(true);
            } 
            else return redirect()->back()->with('message','File tidak ada');
       }
       else return redirect()->back()->with('message','Mohon lakukan dengan benar');
    }
}
