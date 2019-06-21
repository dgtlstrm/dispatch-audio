<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class AppController extends Controller
{

    public function getAudioFileList ()
    {
        return response()->json(scandir(public_path('audio')));
    }

    public function getAudioFile ($file)
    {
        $audioPath = public_path('audio');
        $matchedFiles = [];
        foreach (scandir($audioPath) as $audioFile)
        {
            $first_part = explode("_", $audioFile)[0];
            if ($first_part == $file)
            {
                array_push($matchedFiles, $audioFile);
                break;
            }
            elseif (Str::startsWith($audioFile, strtoupper($file)))
            {
                array_push($matchedFiles, $audioFile);
                break;
            }
            elseif (Str::contains($audioFile, strtoupper($file)))
            {
                array_push($matchedFiles, $audioFile);
                continue;
            }
        }
        if (count($matchedFiles) == 0) return response()->file('audio/A_01.wav');
        else return response()->file('audio/' . Arr::random($matchedFiles));
    }

    public function testGetAudioFile ($file)
    {
        $audioPath = public_path('audio');
        $matchedFiles = [];
        foreach (scandir($audioPath) as $audioFile)
        {
            $first_part = explode("_", $audioFile)[0];
            if ($first_part == $file)
            {
                array_push($matchedFiles, $audioFile);
                break;
            }
            elseif (Str::startsWith($audioFile, strtoupper($file)))
            {
                array_push($matchedFiles, $audioFile);
                break;
            }
            elseif (Str::contains($audioFile, strtoupper($file)))
            {
                array_push($matchedFiles, $audioFile);
                continue;
            }
        }
        return response()->json($matchedFiles);
    }
}
