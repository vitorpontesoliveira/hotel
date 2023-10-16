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

    public function insert(QuartoModel $data)
    {

        $sql = "INSERT INTO quartos (numero, ocupado, valor) VALUES (:numero, :ocupado, :valor)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':numero', $data->numero);
        $stmt->bindValue(':ocupado', $data->ocupado);
        $stmt->bindValue(':valor', $data->valor);
        return $stmt->execute();
    }

    public function update(QuartoModel $data)
    {
        $sql = "UPDATE quartos SET ocupado = :ocupado, numero = :numero, valor = :valor WHERE quarto_id = :quartoId";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':ocupado', $data->ocupado);
        $stmt->bindValue(':numero', $data->numero);
        $stmt->bindValue(':valor', $data->valor);
        $stmt->bindValue(':quartoId', $data->quartoID);
    
        return $stmt->execute();
    }

    public function selectQuartos()
    {
        $sql = "SELECT * FROM quartos";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectByID(int $quartoId)
    {
        $sql = "SELECT * FROM quartos WHERE quarto_id = :quartoId";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':quartoId', $quartoId);
        $stmt->execute();
        return $stmt->fetchObject("App\Model\QuartoModel");
    }

    public function delete(int $quartoId)
    {
        $sql = "DELETE FROM quartos WHERE quarto_id = :quartoId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':quartoId', $quartoId);
        $stmt->execute();
    }
}
