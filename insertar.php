<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor/autoload.php';
require 'config/database.php';

DB ::table('usuarios') ->insert(['usuarios' => $_POST['usuarios']]);


echo 'datos guardados';
