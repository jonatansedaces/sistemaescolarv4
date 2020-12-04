<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as DB;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

// Instantiate app
$app = AppFactory::create();
$app->setBasePath("/sistemaescolarv4/api/index.php/");

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write('Hello World');
    return $response;
});
// Add route callbacks
$app->post('login/usuarios', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getcontents(), false);
    
    $usuario = DB::table('nombreusuarios')
    ->leftJoin('perfiles', 'usuario.idperfil', '=', 'perfiles.idperfil')
    ->where('usuarios.nombreusuarios', $args, ['usuario'])->
    first();

    $response->getBody()->write(json_decode($usuarios));
    return $response;
});

// Run application
$app->run();