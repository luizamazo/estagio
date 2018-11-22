<?php 

namespace App\Http\Controllers;

use Tymon\JWTAuth\Exception\JWTException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Aluno;
use App\Pessoa;
use App\Coordenador;
use App\Supervisor;
use Response;
use JWTAuth;

class UserController extends Controller {
    
    public function register(Request $request, $role){
        
      
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|unique:users'
        ]);

        $user = new User([
            'name' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $role
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
      $role = User::where('email', $request->input('email'))->get()->first()->role;
     
      $user_id = User::where('email', $request->input('email'))->get()->first()->id;

      if($role === 'ALUNO'){
        $pessoa = Pessoa::where('user_id', $user_id)->get()->first()->id;
        $aluno = Aluno::where('pessoa_id', $pessoa)->get()->first()->id;
        return response()->json([
            'token' => $token,
            'user' => $user,
            'aluno_id' => $aluno
        ], 200);
      }else if($role === 'COORDENADOR'){
        $pessoa = Pessoa::where('user_id', $user_id)->get()->first()->id;
        $coordenador = Coordenador::where('pessoa_id', $pessoa)->get()->first()->id;
        return response()->json([
            'token' => $token,
            'user' => $user,
            'coor_id' => $coordenador
        ], 200);
      }else if($role === 'SUPERVISOR'){
        $pessoa = Pessoa::where('user_id', $user_id)->get()->first()->id;
        $supervisor = Supervisor::where('pessoa_id', $pessoa)->get()->first()->id;
        return response()->json([
            'token' => $token,
            'user' => $user,
            'super_id' => $supervisor
        ], 200);
      }else{
          //se deu certo, token é enviado lá pro front
          return response()->json([
            'token' => $token,
            'user' => $user
        ], 200);
      }  
      
    }

    public function logout(){
        
        auth()->logout();

        return response()->json(['msg' => 'tchau....']);
    }
}
