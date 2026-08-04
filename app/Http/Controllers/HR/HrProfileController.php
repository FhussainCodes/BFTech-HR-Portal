<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Register;

class HrProfileController extends Controller
{
    public function index(){
        $user = Register::findOrFail(session('user')['id']);
        return view('hr.profile.index',compact('user'));
    }

    public function editPersonal(){}
    public function updatePersonal(){}

    public function editContact(){}
    public function updateContact(){}

    public function editDesignation(){}
    public function updateDesignation(){}

    public function editOther(){}
    public function updateOther(){}

    public function editPassword(){}
    public function updatePassword(){}


}
