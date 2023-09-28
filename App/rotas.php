<?php

use App\Controller\ClienteController;
use App\Controller\LocacaoController;
use App\Controller\QuartoController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/':
        echo "pagina inicial";
    break;

    case '/cliente':
        ClienteController::index();
    break;

    case '/cliente/form':
        ClienteController::form();
    break;

    case '/cliente/form/save';
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

    default:
        echo "erro";
        break;
}
