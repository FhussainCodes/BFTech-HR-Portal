<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Hr\UpdatePersonalInfoRequest;
use App\Http\Requests\Hr\UpdateContactInfoRequest;
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
        return redirect()->route('hr.profile.index')->with('success','Personal information edited successfully');
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
        return redirect()->route('hr.profile.index')->with('success','Personal information edited successfully');
    }

    public function editDesignation(){}
    public function updateDesignation(){}

    public function editOther(){}
    public function updateOther(){}

    public function editPassword(){}
    public function updatePassword(){}


}
