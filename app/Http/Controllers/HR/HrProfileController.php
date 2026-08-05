<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Hr\UpdatePersonalInfoRequest;
use App\Http\Requests\Hr\UpdateContactInfoRequest;
use App\Http\Requests\Hr\UpdateDesignationRequest;
use App\Http\Requests\Hr\UpdateOtherInfoRequest;
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

    }
    public function updatePassword(){
        
    }


}
