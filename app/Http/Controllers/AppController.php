<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AppController extends Controller
{

    public function getAudioFileList ()
    {
        return response()->json(glob(public_path('audio')));
    }

    public function getAudioFile ($file)
    {
        $audioPath = public_path('audio');
        foreach (scandir($audioPath) as $audioFile)
        {
            if (Str::contains($audioFile, $file))
            {
                return response()->file('audio/' . $audioFile);
            }
        }
    }
}