<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\TraitParserText;
use App\Http\Traits\TraitCombineText;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ParseText0600 extends Controller
{
    use TraitParserText, TraitCombineText;

    public function index()
    {
        return view('parse-text-lainnya');
    }

    public function store(Request $req)
    {

        $req->validate([
            'file*' => 'required|mimes:txt,text|max:10240',
        ]);
        $fileUpload = $req->file('file');
        $urutan = 1;
        $namaFileUpload = $fileUpload[0]->getClientOriginalName();


        $semuaData = [];
        $namaBenar = [
            'LBBPRK-0600-R-M',
            'LBBPRK-0800-R-M',
            'LBBPRK-0900-R-M',
            'LBBPRK-1000-R-M',
            'LBBPRK-1100-R-M',
            'LBBPRK-1200-R-M',
            'LBBPRK-1500-R-M',
        ];

        // Parsing file
        foreach ($fileUpload as $file) {

            $namaUpload = $file->getClientOriginalName();
            if (in_array(substr($namaUpload, 0, 15) ,$namaBenar)){
                if($namaFileUpload != $namaUpload) return response('Upload file yang sama jangan berbeda-beda',406);
                $textParser = $this->parser600($file, $urutan);
                $semuaData[] = $textParser;
                $urutan++;
            }
        }

        // Combine file.
        $new_content = $this->combine600($semuaData);
        Storage::put('public/tempParse600.txt', $new_content);
        return $namaFileUpload;
    }

    public function download(Request $req)
    {
        if (isset($req->fileName)) {
            if (Storage::exists('public/tempParse600.txt')) {
                return response()->download(storage_path('app/public/tempParse600.txt'), $req->fileName)->deleteFileAfterSend(true);
            } else return redirect()->back()->with('message', 'File tidak ada');
        } else return redirect()->back()->with('message', 'Mohon lakukan dengan benar');
    }
}
