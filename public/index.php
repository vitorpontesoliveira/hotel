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
        $clienteController = new ClienteController();
        $clienteController->index();
        break;

    case '/formCliente':
        $clienteController = new ClienteController();
        $clienteController->form();
        break;

    case '/formCliente/save';
        $clienteController = new ClienteController();
        $clienteController->save();
        break;

    case '/cliente/delete';
        $clienteController = new ClienteController();
        $clienteController->delete();
        break;

    case '/quarto':
        $quartoController = new QuartoController();
        $quartoController->index();
        break;

    case '/formQuarto':
        $quartoController = new QuartoController();
        $quartoController->form();
        break;

    case '/formQuarto/save':
        $quartoController = new QuartoController();
        $quartoController->save();
        break;

    case '/quarto/delete':
        $quartoController = new QuartoController();
        $quartoController->delete();
        break;

    case '/locacao':
        $locacaoController = new LocacaoController();
        $locacaoController->index();
        break;

    case '/formLocacao':
        $locacaoController = new LocacaoController();
        $locacaoController->form();
        break;

    case '/formLocacao/save':
        $locacaoController = new LocacaoController();
        $locacaoController->save();
        break;

    case '/locacao/delete':
        $locacaoController = new LocacaoController();
        $locacaoController->delete();
        break;
}
