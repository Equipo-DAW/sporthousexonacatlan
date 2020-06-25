<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
  protected $primaryKey ='idcliente';
  protected $fillable =['idcliente','nombre','apellidopc','apellidomc','email','contraseña','foto'];
}
