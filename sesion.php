<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor/autoload.php';
require 'config/database.php';

$users = DB ::table('usuarios') ->insert('nombreusuarios', '=', $_POST['usuarios'])->first();

 var_dump($users);

if ($_POST ['password' == $users->password]){
    $mensaje = '<h1>BIENVENIDO</h1> <a class="button" href= "inicio.php"> ENTRAR AL SISTEMA</a>'; 
}
else{
    $mensaje= 'El usuario o contraseña es incorrecto';
}
echo <<<_HTML


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="node_modules\bulma\css\bulma.min.css">
<title>sistema escolarv4</title>
</head>
<body>
    {$mensaje}
</body>
</html>
_HTML;