<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public  function  register(Request $request){
      
        $data = User::where('identificacion', '=', $request->identificacion)->orWhere('email', '=',$request->email)->get();
        if (count($data) != 0) {
            $respuesta = "este correo o cedula ya estan registrados ";

            return response()->json([
                'ok'    => false,
                'menssage'  => $respuesta
                
            ]);
        } else{


   
        $Usuarios=new User([
            
            'nombres'=>$request->Nombres,
            'apellidos'=>$request->Apellidos,
            'identificacion'=>$request->identificacion,
            'telefono'=>$request->Telefono,
            'email'=>$request->email,
            'direccion'=>$request->Direccion,
            'password'=>bcrypt($request->password),
            'habeasdata'=>$request->habeasdata
            

        ]);
        
       if ($Usuarios->save()){
        $token= $Usuarios->createToken('authToken')->accessToken;
        $menssage="Usuario registrado correctamente";
        return response()->json([
            'ok'    => true,
            'menssage'  => $menssage
           
        ]);
        }
    }
       

        
        
        //return $token;      
      }
    
      public function login(Request $request){
        //$Usuarios=new User();
      
        $data = $request->only('email','password');
        //var_dump(Auth::attempt($data));
        if (!Auth::attempt($data)) {
            return response()->json([
                'ok'    => false,
                'user'  => 'Error de credenciales',
            ]);
        }

        $token = Auth::user()->createToken('authToken')->accessToken;

        return response()->json([
            'ok'    => true,
            'user'  => Auth::user(),
            'token' => $token
        ]);
        }
    
        public function me(){
            return response()->json([
                'ok'    => true,
                'user'  => Auth::user(),
            ]);
          }
}
