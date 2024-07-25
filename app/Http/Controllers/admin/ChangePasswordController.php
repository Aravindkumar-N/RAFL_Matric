<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index(){
        try{
            return view('auth.passwords.change_password');
        }
        catch(\Exception $e){
            return back()->with(['error'=>$e->getMessage()])->withInput();
        }
    }

    public function setPassword(Request $request){
        $validate = $request->validate([
            'email'=>'required',
            'old_password'=>'required',
            'new_password'=>'required|',
            'confirm_password'=>'required|same:new_password',
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' =>$request->old_password])){
            $id = Auth::user()->id;
            $user = User::where('id',$id)->first();
            $user->update(['password'=>Hash::make($request->new_password)]);
            return response()->json(['status'=>true,'success'=>'New password Change success'],200);
        }
        else{
            return response()->json(['status'=>false,'error'=>'Credentials Does Not match']);
        }
    }
}
