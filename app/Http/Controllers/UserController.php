<?php 

namespace App\Http\Controllers;

use Tymon\JWTAuth\Exception\JWTException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use JWTAuth;

class UserController extends Controller {
    
    public function register(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|unique:users'
        ]);

        $user = new User([
            'name' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        $user->save();

        return response()->json([
            'message' => "Deu bom, user criado"
        ], 201);
    }

    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $credentials = $request->only('email', 'password');
        
        //se try falhar, falhou em criar um token
        try{
            //tento usando as credenciais dadas, se não deu certo, quer dizer q token n foi criado
            if(!$token = JWTAuth::attempt($credentials)){
                //se n foi criado
                return response()->json([
                    'error' => 'invalid credentials'
                ], 401);
            }
        }catch(JWTException $e){
            return response()->json([
                'error' => 'could not create token'
            ], 500);
        }
      //  $user = JWTAuth::parseToken()->toUser();
      $user = User::where('email', $request->input('email'))->first();
        //se deu certo, token é enviado lá pro front
        return response()->json([
            'token' => $token,
            'user' => $user
        ], 200);
    }

    public function logout(){
        
        auth()->logout();

        return response()->json(['msg' => 'tchau....']);
    }
}
