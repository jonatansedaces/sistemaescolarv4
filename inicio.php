<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor/autoload.php';
require 'config/database.php';

$user = DB::table('usuarios')
->leftJoin('perfiles', 'usuarios.idperfil', '=', 'perfiles.idperfil')
->where('usuarios.idusuarios', $_GET ['idusuario'])->first();
?>

!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="node_modules\bulma\css\bulma.min.css">
<title>sistema escolarv4</title>
</head>
<body>
 <div class ="container">
    <h1>sistema escolarv4</h1>
    <?php if ($user->nombreperfil == 'profesor') {?>
    <h2>agregar calificacion:</h2>

     <form action="longin.php" method="post">
       <label for="calificaciones">calificacion:</label>
       <input id="calificaciones" type="text" name="calificacion">
       <input class="button" type="submit" value="guardar">
     </form>

    <?php } ?>
    
    <form action="consultar.php" method="post">
        <input  class="button" type="submit" value="consultar">
    </form>
     </div>
</body>
</html>