<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Http\Requests\ImageRequest;

class ProfileController extends Controller
{
    public function show(){
        // $user = session('user');
        // $record = Register::find($user['id']);
        $user = Register::find(session('user')['id']);
        return view('employee.profile.index',compact('user'));
    }

    public function uploadImage(ImageRequest $request){

        $user = Register::find(session('user')['id']);
        $image = $request->file('profile_image');
        $fileName = $user->id . '_' . time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('profile_images',$fileName,'public');
        $old_image = $user->profile_image;
        $user->profile_image = $path;
        $user->save();
        if($old_image){
            Storage::disk('public')->delete($old_image);
            }
        return back()->with('success', 'Profile image updated successfully.');
    }    
}
