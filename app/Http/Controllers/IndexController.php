<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('index');
    }


    public function pruebas()
    {
        $files = Storage::files('public/tmpStorage');
        
        foreach ($files as $file) {
            $createdAt = Carbon::createFromTimestamp(Storage::lastModified($file));
            if ($createdAt->addMinutes(1)->isPast()) {
                Storage::delete($file);
            }
        }
    }
}
