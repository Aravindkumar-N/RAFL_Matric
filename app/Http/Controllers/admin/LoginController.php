<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        try{
            return view('auth.login');
        }
        catch(\Exception $e){
            return back()->with(['error'=>$e->getMessage()])->withInput();
        }
    }
    public function login(Request $request){

        $validator = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
           $user = Auth::user();

           return response()->json(['status'=>true,'data'=>$user],200);
        }else{
            return response()->json(['error'=>'Credencials does not match']);
        }
    }
}
