<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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
  public function  recoverypass(Request $request){
  
  
    $rand = range(1, 13);
    $nvpassword="";
    shuffle($rand);
    foreach ($rand as $val) {
    $nvpassword.=$val;
    }

    $data = User::where('email', '=', $request->email)->get();
    //print_r($data);
    $iduser=$data[0]['id'];
     //echo $iduser;
    $updateUser= DB::table('users')->where("id",$iduser)->update(["password"=>bcrypt($nvpassword)]);
       
    //return $updateUser;
 if ($updateUser==1){

    $fields = array('correo' => $request->email, 'nvpassword' => $nvpassword);
    //$fields_string = http_build_query($fields);
    //$ch = curl_init();
    //curl_setopt($ch, CURLOPT_URL, "https://campushumax.com/wp-admin/reporte2/correos.php");
    //curl_setopt($ch, CURLOPT_POST, 1);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string );
    //$data = curl_exec($ch);
    //curl_close($ch);
    //var_dump($data);
    return   $fields;

 }  
}

 public function cambiopass(Request $request){
    //$data = User::where('email', '=', $request->email)->get();
    //print_r($data);
    $iduser=$request->iduser;
    $nvpassword=$request->Password;
     //echo $iduser;
    $updateUser= DB::table('users')->where("id",$iduser)->update(["password"=>bcrypt($nvpassword)]);
    if ($updateUser==1){
        return response()->json([
            'ok'    => true,
            
        ]);
    }
 
  } 


}
