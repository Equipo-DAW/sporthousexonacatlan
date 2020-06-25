<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\productos;

use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\DB;

use Session;

use Mail;

class ClientesController extends Controller
{
  public function guardaCliente(Request $request){

      $idcliente = $request-> idcliente;
      $nombre = $request-> nombre;
      $apellidopc = $request-> apellidopc;
      $apellidomc = $request-> apellidomc;
      $email = $request-> email;
      $contraseña = $request-> contraseña;

        $file = $request->file('foto');
          if($file!="")
          {
            $ldate = date('Ymd_His_');
            $img = $file->getClientOriginalName();
            $img2 = $ldate.$img;
            \Storage::disk('public')->put($img2, \File::get($file));
          }
          else
          {
            $img2 = "no-image.png";
          }
          /*
          $subject = "Bienvenido a SportHouse Xonacatlán";
          $for1 = $request -> email;
          Mail::send('email.bienvenida',$request->all(), function($msj) use($subject,$for1){
            $msj->from("contactosporthouse@sporthousexonacatlan.com.mx","SportHouseXonacatlan");
            $msj->subject($subject);
            $msj->to($for1);
          });

          $subject = "Nuevo Uuario en SportHouse Xonacatlán";
          $for = "contactosporthouse@sporthousexonacatlan.com.mx";
          Mail::send('email.notificacion',$request->all(), function($msj) use($subject,$for){
            $msj->from("contactosporthouse@sporthousexonacatlan.com.mx","SportHouseXonacatlan");
            $msj->subject($subject);
            $msj->to($for);
          });*/

      $result=\DB::select('CALL altacliente(?,?,?,?,?,?,?)',
      [$idcliente,$nombre,$apellidopc,$apellidomc,$email,$contraseña,$img2]);

        if($result == TRUE){
            system($result);
            echo "<script> alert('Perfil Creado Satisfactoriamente');
            window.location='http://localhost:8080/sporthouse-local/iniciarsesioncliente';
            </script>";
        }
        else{
            echo "<script> alert('Perfil Creado Satisfactoriamente');
            window.location='http://localhost:8080/sporthouse-local/iniciarsesioncliente';
            </script>";
          }
  }
  public function comprar(Request $request){
    $productos = productos::all();
    $datos=$this->validate(request(),[
      'email'=>'required',
      'contraseña'=>'required'
      ]);
      $correo=$request['email'];
      $password=($request['contraseña']);
      $enc=DB::select("CALL busca_cliente('$correo','$password')");
      //$encontrado=$enc[0]->encontrado;
      if(count($enc)== 0)
        {
          echo"<script>alert('Error Datos Incorrectos');
                         window.location='http://localhost:8080/sporthouse-local/iniciarsesioncliente';
                         </script>";
        }
          else{
            Session::put('sesionfoto',$enc[0]->foto);
            Session::put('sesionname',$enc[0]->nombre);
            Session::put('sesionapc',$enc[0]->apellidopc);
            Session::put('sesionamc',$enc[0]->apellidomc);
            Session::put('sesionid',$enc[0]->idcliente);            

          return view('productos.comprar')
          ->with('productos',$productos);
        }
  }
  public function salir(){
    Session::flush();
    Session::flash('error','Sesion Cerrada');
      return redirect('/iniciarsesioncliente');
 	}
}
