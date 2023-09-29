<?php

namespace App\Http\Controllers;

use App\Services\TemporaryFileService;
use App\Http\Requests\TemporaryFileImageRequest;
use Illuminate\Http\Request;

class TemporaryFileController extends Controller
{
    public function createFileImage(TemporaryFileImageRequest $request) 
    {
        $filename = TemporaryFileService::createImage($request->file('file'));
        return response()->json([
            'filename' => $filename
        ]);
    }
}
