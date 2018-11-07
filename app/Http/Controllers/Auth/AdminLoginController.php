<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;


class AdminLoginController extends Controller
{
    
    public function __construct(){
        //se for convidado, s n tiver logado como admin, chama isso
        $this->middleware('guest:admin');
    }

    public function login(Request $request){
        
        $this->validate($request, [
            'email'=> 'required|string',
            'password' => 'required',
        ]);

        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password
        ];
        
        $authOK = Auth::guard['admin']->attempt(
            $credentials, $request->remember);
        
            if($authOK){
                return redirect()->intended[route('admin.dashboard')];
            }

            return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function index(){
        return view('auth.admin-login');
    }

}
