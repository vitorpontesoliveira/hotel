<?php

namespace App\DAO;

use App\Model\ClienteModel;
use \PDO;


class ClienteDAO extends DAO
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert(ClienteModel $model)
    {
        $sql = "INSERT INTO clientes (nome, telefone, email) VALUES (:nome, :telefone, :email)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':nome', $model->nome);
        $stmt->bindValue(':telefone', $model->telefone);
        $stmt->bindValue(':email', $model->email);

        return $stmt->execute();
    }

    public function update(ClienteModel $model)
    {
        $sql = "UPDATE clientes SET nome = :nome, telefone = :telefone, email = :email WHERE cliente_id = :cliente_id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':nome', $model->nome);
        $stmt->bindValue(':telefone', $model->telefone);
        $stmt->bindValue(':email', $model->email);
        $stmt->bindValue(':cliente_id', $model->cliente_id);
        return $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM clientes";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectByID(int $cliente_id)
    {
        $sql = "SELECT * FROM clientes WHERE cliente_id = :cliente_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':cliente_id', $cliente_id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\ClienteModel");
    }

    public function delete(int $cliente_id)
    {
        $sql = "DELETE FROM clientes WHERE cliente_id = :cliente_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':cliente_id', $cliente_id);
        $stmt->execute();
    }
}
