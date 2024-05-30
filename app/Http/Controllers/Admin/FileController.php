<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function image(string $id)
    {
        $file = File::find($id);

        return \Storage::download($file->hash, headers: [
            'Content-Disposition' => 'inline' ,
        ]);
    }
}
