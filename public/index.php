<?php

require '../configs/config.php';

use App\Controller\ClienteController;
use App\Controller\LocacaoController;
use App\Controller\QuartoController;
use App\Controller\HomeController;

// Mapeamento de rotas
$routes = [
    '/cliente'          => ['controller' => ClienteController::class, 'action' => 'index'],
    '/formCliente'      => ['controller' => ClienteController::class, 'action' => 'form'],
    '/formCliente/save' => ['controller' => ClienteController::class, 'action' => 'save'],
    '/cliente/delete'   => ['controller' => ClienteController::class, 'action' => 'delete'],
    '/quarto'           => ['controller' => QuartoController::class, 'action' => 'index'],
    '/formQuarto'       => ['controller' => QuartoController::class, 'action' => 'form'],
    '/formQuarto/save'  => ['controller' => QuartoController::class, 'action' => 'save'],
    '/quarto/delete'    => ['controller' => QuartoController::class, 'action' => 'delete'],
    '/locacao'          => ['controller' => LocacaoController::class, 'action' => 'index'],
    '/formLocacao'      => ['controller' => LocacaoController::class, 'action' => 'form'],
    '/formLocacao/save' => ['controller' => LocacaoController::class, 'action' => 'save'],
    '/locacao/delete'   => ['controller' => LocacaoController::class, 'action' => 'delete'],
    '*'                 => ['controller' => HomeController::class, 'action' => 'index'], // Rota curinga
];

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Verifica se a rota existe no mapeamento
if (array_key_exists($url, $routes)) {
    $route = $routes[$url];

    // Cria uma instância do controlador e chama a ação
    $controller = new $route['controller'];
    $action = $route['action'];

    $controller->$action();
} else {
    // Rota curinga, redireciona para a página inicial
    $route = $routes['*'];

    // Cria uma instância do controlador e chama a ação
    $controller = new $route['controller'];
    $action = $route['action'];

    $controller->$action();
}
