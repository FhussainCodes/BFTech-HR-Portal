<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class YouTubeController extends Controller
{
    public function index(){
    $videos = [];
        
    return view('hr.youtube.index',compact('videos',));
}


    public function search(Request $request){
    $videos = [];

    if ($request->filled('q')) {

        $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
            'key' => env('YOUTUBE_API_KEY'),
            'part' => 'snippet',
            'q' => $request->q,
            'type' => 'video',
            'maxResults' => 40,
        ]);

        $videos = $response->json()['items'] ?? [];
    }
    return view('hr.youtube.index', compact('videos'));
}

       // public function youtubeData(){
    //     $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
    //     'key' => env('YOUTUBE_API_KEY'),
    //     'part' => 'snippet',
    //     'q' => 'express js tutorial',
    //     'type' => 'video'
    // ]);
    // return $response->json();
    // } 

 public function comments(Request $request)
    {
        $request->validate([
            'videoId' => 'required|string',
        ]);

        $response = Http::get(
            'https://www.googleapis.com/youtube/v3/commentThreads',
            [
                'key' => env('YOUTUBE_API_KEY'),
                'part' => 'snippet',
                'videoId' => $request->videoId,
                'maxResults' => 10,
                'textFormat' => 'plainText',
            ]
        );

        if ($response->failed()) {
            return response()->json([
                'success' => false,
                'message' => 'Unable to load comments.',
            ], 500);
        }

        $items = $response->json()['items'] ?? [];

        $comments = [];

        foreach ($items as $item) {

            $comment = $item['snippet']['topLevelComment']['snippet'];

            $comments[] = [
                'author' => $comment['authorDisplayName'] ?? 'Unknown User',
                'text' => $comment['textDisplay'] ?? '',
            ];
        }

        return response()->json([
            'success' => true,
            'comments' => $comments,
        ]);
    }

    public function watch($videoId)
{
    return view('hr.youtube.watch', compact('videoId'));
}

}
