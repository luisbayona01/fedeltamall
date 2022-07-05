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
    require base_path("vendor/autoload.php");
    $mail =  new PHPMailer();
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
    $updateUser= DB::table('users')->where("id",$iduser)->update(["password"=>$nvpassword]);
       
    //return $updateUser;
 if ($updateUser==1){

    try {
    $asunto="recuperacion de contraseña";
    $mail->SetFrom('notificaciones@fedeltamall.digital', 'fedeltamall');
    $addres = $request->email;
    //$mail->AddAttachment($nombre);
    $mail->Subject = $asunto;
    //la a���ado a la clase, indicando el nombre de la persona destinatario
    $mail->AddAddress($addres, "fedeltamall");
    $body="<p> Buen dia, 
    <br><br>
     su Contraseña provisional  es ".$nvpassword." Porfavor cambiarla una vez inicie sesion.  </p>";
    $mail->MsgHTML($body);
    if(!$mail->Send()) {
        $respesta= "Error al enviar el mensaje: " . $mail->ErrorInfo;
    }else{
        $respesta="mensaje enviado correctamente". $request->email;
    }

    return response()->json([
        
        'respuesta'  => $respesta,
    ]);
    } catch (Exception $e) {
            
             return response()->json([
        
                'respuesta'  => $e,
            ]);
        }


 }  


  } 


}
