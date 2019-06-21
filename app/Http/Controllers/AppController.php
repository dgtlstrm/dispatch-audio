<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AppController extends Controller
{
    public function getAudioFile ($file)
    {
        $audioPath = public_path('audio');
        foreach (glob($audioPath) as $audioFile)
        {
            if (Str::contains($audioFile, $file))
            {
                return response()->file($audioPath . $audioFile);
            }
        }
    }
}
