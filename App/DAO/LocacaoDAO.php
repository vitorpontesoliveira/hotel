<?php

namespace App\DAO;

use App\Model\LocacaoModel;
use \PDO;


class LocacaoDAO extends DAO
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert(LocacaoModel $model)
    {
        $sql = "INSERT INTO locacoes (cliente_id, quarto_id, data) VALUES ( :cliente_id, :quarto_id, :data)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':cliente_id', $model->cliente_id);
        $stmt->bindValue(':quarto_id', $model->quarto_id);
        $stmt->bindValue(':data', $model->data);
        return $stmt->execute();
    }

    public function selectClientes()
    {
        $sql = "SELECT cliente_id, nome FROM clientes";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectQuartos()
    {
        $sql = "SELECT * FROM quartos";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function select()
    {
        $sql = "SELECT l.locacao_id, c.nome AS cliente_nome, q.numero AS numero_quarto, to_char(l.data, 'DD/MM/YYYY') AS data_formatada
        FROM locacoes AS l
        INNER JOIN clientes AS c ON l.cliente_id = c.cliente_id
        INNER JOIN quartos AS q ON l.quarto_id = q.quarto_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectByID(int $locacao_id)
    {
        $sql = "SELECT * FROM locacoes WHERE locacao_id = :locacao_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':locacao_id', $locacao_id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\ClienteModel");
    }

    public function delete(int $locacao_id)
    {
        $sql = "DELETE FROM locacoes WHERE locacao_id = :locacao_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':locacao_id', $locacao_id);
        $stmt->execute();
    }
}
