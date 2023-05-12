<?php

namespace App\Http\Controllers;
use App\Models\Video;
use Illuminate\Http\Request;
use Storage;
// use Illuminate \Http\Exceptions\PostTooLargeException;

class VideoController extends Controller
{
    public function uploadVideo(Request $request)
    {
         $this->validate($request, [
             'title' => 'required|string|max:255',
             'video' => 'required|file|mimetypes:video/mp4',
         ]);
  
         $fileName = $request->video->getClientOriginalName();
         $filePath = 'videos/' . $fileName;
  
         $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));
  
         // File URL to access the video in frontend
         $url = Storage::disk('public')->url($filePath);
  
         if ($isFileUploaded) {
             $video = new Video();
             $video->title = $request->title;
             $video->video = $filePath;
             $video->save();
  
             return back()
             ->with('success','Video has been successfully uploaded.');
         }
  
         return back()
             ->with('error','Unexpected error occured');
     }
   public function index(){
    return view('uploadVideo');
   }
}
