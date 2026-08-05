<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Hr\UpdatePersonalInfoRequest;
use App\Http\Requests\Hr\UpdateContactInfoRequest;
use App\Http\Requests\Hr\UpdateDesignationRequest;
use App\Http\Requests\Hr\UpdateOtherInfoRequest;
use App\Http\Requests\Hr\UpdatePasswordRequest;
use App\Http\Requests\Hr\UpdateProfileImageRequest;
use App\Models\Register;

class HrProfileController extends Controller
{
    public function index(){
        $user = Register::findOrFail(session('user')['id']);
        return view('hr.profile.index',compact('user'));
    }

    public function editPersonal(){
        $user = Register::findOrFail(session('user')['id']);
        return view('hr.profile.personal-info-edit', compact('user'));
    }

    public function updatePersonal(UpdatePersonalInfoRequest $request){
        $user  = Register::findOrFail(session('user')['id']);
        $user->update($request->validated());
        session([
            'user' => $user
        ]);
        return redirect()->route('hr.profile.index')->with('success','Personal information updated successfully');
    }

    public function editContact(){
        $user = Register::findOrFail(session('user')['id']);
        return view('hr.profile.contact-info-edit', compact('user'));
    }
    public function updateContact(UpdateContactInfoRequest $request){
        $user  = Register::findOrFail(session('user')['id']);
        $user->update($request->validated());
        session([
            'user' => $user
        ]);
        return redirect()->route('hr.profile.index')->with('success','Contact information updated successfully');
    }

    public function editDesignation(){
        $user = Register::findOrFail(session('user')['id']);
        return view('hr.profile.designation-edit', compact('user'));
    }
    public function updateDesignation(UpdateDesignationRequest $request){
        $user  = Register::findOrFail(session('user')['id']);
        $user->update($request->validated());
        session([
            'user' => $user
        ]);
        return redirect()->route('hr.profile.index')->with('success','Designation information updated successfully');
    }

    public function editOther(){
        $user = Register::findOrFail(session('user')['id']);
        return view('hr.profile.other-info-edit', compact('user'));
    }
    public function updateOther(UpdateOtherInfoRequest $request){
        $user  = Register::findOrFail(session('user')['id']);
        $user->update($request->validated());
        session([
            'user' => $user
        ]);
        return redirect()->route('hr.profile.index')->with('success','Other Information updated successfully');
    }

    public function editPassword(){
        $user = Register::findOrFail(session('user')['id']);
        return view('hr.profile.password-edit', compact('user'));
    }
    public function updatePassword(UpdatePasswordRequest $request){
        $user  = Register::findOrFail(session('user')['id']);
        $user->update([
        'password' => Hash::make($request->password),
        'confirm_password' => Hash::make($request->confirm_password)
        ]);
        session([
            'user' => $user
        ]);
        return redirect()->route('hr.profile.index')->with('success','Other Information updated successfully');
    }

        public function uploadImage(UpdateProfileImageRequest $request){
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

    public function deleteImage() {

        $user = Register::findOrFail(session('user')['id']);
        if($user->profile_image){
            Storage::disk('public')->delete($user->profile_image);
            $user->profile_image = null;
            $user->save();

            session([
                'user'=>$user
            ]);
            
            return back()->with('success','profile image deleted successfully');
        }

    }

}
