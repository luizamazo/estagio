<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct() {
        //se for convidado, s n tiver logado como admin, chama isso
        $this->middleware('guest:admin');
        
    }

    public function index() {
        return view('auth.admin-login');
    }

    public function login(Request $request) {

        // validar o dado que vem do formulario
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        // tentar logar
        $credentials = [ 'email'    => $request->email,  
                         'password' => $request->password ];
        
        $authOk = Auth::guard('admin')->attempt($credentials, $request->remember); // ==> assim eu utilizo o guard do admin


        // se ok, então direcionar para a localização interna
        if ($authOk) {
           
            return redirect()->intended(route('admin.dashboard'));
        }
        
        // se não, redirecionar novamente para o login, passando novamente os parametros do request
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
