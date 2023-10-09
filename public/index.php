<?php
require '../configs/config.php';

use App\Controller\ClienteController;
use App\Controller\LocacaoController;
use App\Controller\QuartoController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {

    case '/home':
        echo 'pagina inicial';
    break;

    case '/cliente':
        ClienteController::index();
        break;

    case '/formCliente':
        ClienteController::form();
        break;
        
    case '/formCliente/save';
        ClienteController::save();
        break;

    case '/cliente/delete';
        ClienteController::delete();
        break;

    case '/quarto':
        QuartoController::index();
        break;

    case '/formQuarto':
        QuartoController::form();
        break;

    case '/formQuarto/save':
        QuartoController::save();
        break;

    case '/quarto/delete':
        QuartoController::delete();
        break;

    case '/locacao':
        LocacaoController::index();
        break;

    case '/formLocacao':
        LocacaoController::form();
        break;

    case '/formLocacao/save':
        LocacaoController::save();
        break;

    case '/locacao/delete':
        LocacaoController::delete();
        break;
}
