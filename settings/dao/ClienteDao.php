<?php
require_once __DIR__ . '/../controller/ClienteController.php';
require_once __DIR__ . '/../model/Cliente.php';

class ClienteDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function cadastrarCliente(Cliente $cliente)
    {
        $sql = "INSERT INTO clientes (nome, telefone, email) VALUES (:nome, :telefone, :email)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':nome', $cliente->getNome());
        $stmt->bindParam(':telefone', $cliente->getTelefone());
        $stmt->bindParam(':email', $cliente->getEmail());

        return $stmt->execute();
    }

    public function editarCliente(Cliente $cliente)
    {
        $sql = "UPDATE clientes SET nome = :nome, telefone = :telefone, email = :email WHERE cliente_id = :cliente_id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':cliente_id', $cliente->getId());
        $stmt->bindParam(':nome', $cliente->getNome());
        $stmt->bindParam(':telefone', $cliente->getTelefone());
        $stmt->bindParam(':email', $cliente->getEmail());

        return $stmt->execute();
    }

    public function listarClientes()
    {
        $clientes = [];
        $sql = "SELECT * FROM clientes";

        $stmt = $this->pdo->query($sql);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $clientes[] = $row;
        }

        return $clientes;
    }
}
