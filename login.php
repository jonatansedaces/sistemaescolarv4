<?php

use Illuminate\Database\Capsule\Manager as DB;

require 'vendor/autoload.php';
require 'config/database.php';

$user = DB::table('usuarios')
->leftJoin('perfiles', 'usuarios.idperfil', '=', 'perfiles.idperfil')
->where('nombreusuarios', $_POST['usuarios'])->first();

$mensaje='';
if($user->password == $_POST['password']){
   $mensaje = "<h1 BIENVENIDO: {$user->nombreperfiles} {$user->nombreusuarios}</h1>
   <br> <a href='inicio.php?idusuarios={$user->idusuario}'>entrar al sistema escolar</a>";
}else{
   $mensaje= "<h1>usuario y o contraseña erroneos, por favor verifique ivuelva auntentificarse</h1>
   <br> <a href='index.html'>regresar </a>";
}
echo $mensaje;
