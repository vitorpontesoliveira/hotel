<?php

use App\Controller\ClienteController;

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

    default:
        echo "erro";
        break;
}
