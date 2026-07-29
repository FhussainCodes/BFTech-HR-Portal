<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Http\Requests\ImageRequest;

use App\Http\Requests\PersonalInfoRequest;
use App\Http\Requests\ContactInfoRequest;
use App\Http\Requests\DesignationInfoRequest;
use App\Http\Requests\OtherInfoRequest;

class ProfileController extends Controller
{
    public function show(){
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

    public function editPersonal(){

        $user = Register::find(session('user')['id']);
        return view('employee.profile.editPersonal', compact('user'));
    }
    
    public function updatePersonal(PersonalInfoRequest $request)
{
    $user = Register::find(session('user')['id']);
    $user->update($request->validated());

    session([
        'user' => $user
    ]);

    return redirect()->route('emp-profile-index')->with('success', 'Personal information updated successfully.');
}

// For Contact

    public function editContact(){
        $user = Register::find(session('user')['id']);
        return view('employee.profile.editContact', compact('user'));
    }

    public function updateContact(ContactInfoRequest $request){

    $user = Register::find(session('user')['id']);
    $user->update($request->validated());

    session([
        'user' => $user
    ]);

    return redirect()->route('emp-profile-index')->with('success', 'Contact information updated successfully.');    
    }

    // For Designation
    public function editDesignation(){
        $user = Register::find(session('user')['id']);
        return view('employee.profile.editDesignation', compact('user'));
    }

    public function updateDesignation(DesignationInfoRequest $request){

    $user = Register::find(session('user')['id']);
    $user->update($request->validated());

    session([
        'user' => $user
    ]);

    return redirect()->route('emp-profile-index')->with('success', 'Designation information updated successfully.');   
    }

    public function editOther(){
        $user = Register::find(session('user')['id']);
        return view('employee.profile.editOther', compact('user'));
    }

    public function updateOther(OtherInfoRequest $request){

    $user = Register::find(session('user')['id']);
    $user->update($request->validated());

    session([
        'user' => $user
    ]);

    return redirect()->route('emp-profile-index')->with('success', 'Other information updated successfully.'); 
    }
}
