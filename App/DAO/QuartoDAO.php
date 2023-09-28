<?php

namespace App\DAO;

use App\Model\QuartoModel;
use \PDO;

class QuartoDAO extends DAO
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert(QuartoModel $model)
    {

        $sql = "INSERT INTO quartos (numero, ocupado, valor) VALUES (:numero, :ocupado, :valor)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':numero', $model->numero);
        $stmt->bindValue(':ocupado', $model->ocupado);
        $stmt->bindValue(':valor', $model->valor);
        return $stmt->execute();
    }

    public function update(QuartoModel $model)
    {
        $sql = "UPDATE quartos SET ocupado = :ocupado, numero = :numero, valor = :valor WHERE quarto_id = :quarto_id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':ocupado', $model->ocupado);
        $stmt->bindValue(':numero', $model->numero);
        $stmt->bindValue(':valor', $model->valor);
        $stmt->bindValue(':quarto_id', $model->quarto_id);
    
        return $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM quartos";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectByID(int $quarto_id)
    {
        $sql = "SELECT * FROM quartos WHERE quarto_id = :quarto_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':quarto_id', $quarto_id);
        $stmt->execute();
        return $stmt->fetchObject("App\Model\QuartoModel");
    }

    public function delete(int $quarto_id)
    {
        $sql = "DELETE FROM quartos WHERE quarto_id = :quarto_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':quarto_id', $quarto_id);
        $stmt->execute();
    }
}
