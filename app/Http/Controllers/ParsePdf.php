<?php

namespace App\Http\Controllers;

use Spatie\PdfToText\Pdf;
use Illuminate\Http\Request;

class ParsePdf extends Controller
{
    public function index() {
        return view('parse-pdf');
    }

    public function store(Request $req) {
$text = '';
        // $text = (new Pdf())
        //     ->setPdf($req->file('pdf')->getPathName())
        //     ->text();
        dd($req->file('pdf'),$text);
    }
}
