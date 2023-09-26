<?php
require_once __DIR__ .'/ClienteController.php';
require_once __DIR__ .'/../dao/ClienteDao.php';


class MainController
{
    private $pdo;
    private $clienteController;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->clienteController = new ClienteController($pdo);
    }

    public function handleNewClientRequest()
    {
        $this->clienteController->cadastrarCliente();
    }

    public function handleListClientsRequest()
    {
        $this->clienteController->listarClientes();
    }

    // Adicione mais métodos para outras ações conforme necessário
}
