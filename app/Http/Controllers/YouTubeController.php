<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class YouTubeController extends Controller
{
    // public function youtubeData(){
    //     $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
    //     'key' => env('YOUTUBE_API_KEY'),
    //     'part' => 'snippet',
    //     'q' => 'express js tutorial',
    //     'type' => 'video'
    // ]);
    // return $response->json();
    // }

    public function search(Request $request){
        $query = $request->input('q');
        
        $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
        'key' => env('YOUTUBE_API_KEY'),
        'part' => 'snippet',
        'q' => $query,
        'type' => 'video',
        'maxResults' => 10
    ]);

    return $response->json();
    }

    public function index(){
        return view('hr.youtube.index');
    }
    
}
