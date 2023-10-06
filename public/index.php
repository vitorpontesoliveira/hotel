<?php
require '../configs/config.php';

use App\Controller\ClienteController;
use App\Controller\LocacaoController;
use App\Controller\QuartoController;

$smarty->display('template.tpl');

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/cliente':
        ClienteController::index();
        break;

    case '/formCliente':
        ClienteController::form();
        break;
        
    case '/save';
        ClienteController::save();
        break;

    case '/cliente/delete';
        ClienteController::delete();
        break;

    case '/quarto':
        QuartoController::index();
        break;

    case '/quarto/form':
        QuartoController::form();
        break;

    case '/quarto/form/save':
        QuartoController::save();
        break;

    case '/quarto/delete':
        QuartoController::delete();
        break;

    case '/locacao':
        LocacaoController::index();
        break;

    case '/locacao/form':
        LocacaoController::form();
        break;

    case '/locacao/form/save':
        LocacaoController::save();
        break;

    case '/locacao/delete':
        LocacaoController::delete();
        break;
}
