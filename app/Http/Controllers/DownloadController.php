<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download($filename)
    {
        $file = storage_path('app/' . $filename);

        if (file_exists($file)) {
            return response()->download($file, $filename);
        }

        abort(404, 'File not found.');
    }
}
