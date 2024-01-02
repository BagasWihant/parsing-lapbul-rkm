<?php

namespace App\Http\Controllers;

use App\Http\Traits\TraitCombineText;
use Illuminate\Http\Request;
use App\Http\Traits\TraitParserText;
use Illuminate\Support\Facades\Storage;

class ParseText extends Controller
{
     use TraitParserText, TraitCombineText;

     public function index()
     {
          return view('parse-text');
     }

     public function store(Request $req)
     {
          if (Storage::exists('temp/temporaryParser.txt')) Storage::delete('temp/temporaryParser.txt');
          
          $req->validate([
               'file*' => 'required|mimes:txt,text|max:10240',
          ]);
          $fileUpload = $req->file('file');
          $urutan = 1;
          $new_content= '';

          // Parsing file
          foreach ($fileUpload as $file) {
               $textParser = $this->parser100($file, $urutan);
               
               if (!Storage::exists('temp/temporaryParser.txt')) {
                    Storage::put('temp/temporaryParser.txt', $textParser);
               }else{
                    $contents = Storage::get('temp/temporaryParser.txt');
                    $new_content = $contents . $textParser;
                    Storage::delete('temp/temporaryParser.txt');
                    Storage::put('temp/temporaryParser.txt', $new_content);
               }

               $urutan++;
          }

          // return Storage::download('public/' . $namaFileUpload, "Parse_$namaFileUpload");

          // Combine file.
     }
}
