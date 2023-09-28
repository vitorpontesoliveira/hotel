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
        $sql_check = "SELECT COUNT(*) FROM locacoes WHERE quarto_id = :quarto_id AND data = :data_locacao";

        $stmt_check = $this->pdo->prepare($sql_check);

        $stmt_check->bindValue(':quarto_id', $model->quarto_id);
        $stmt_check->bindValue(':data_locacao', $model->data_locacao);
        $stmt_check->execute();
        $num_reservas = $stmt_check->fetchColumn();
        var_dump($num_reservas);

        if ($num_reservas > 0) {
            echo "<script>alert('Este quarto já está reservado para a data especificada. Por favor, escolha outra data ou quarto.');</script>";
            echo "<script>window.history.back();</script>";
        } else {
            $sql = "INSERT INTO locacoes (quarto_id, cliente_id, data) VALUES(:quarto_id, :cliente_id, :data_locacao)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':quarto_id', $model->quarto_id);
            $stmt->bindValue(':cliente_id', $model->cliente_id);
            $stmt->bindValue(':data_locacao', $model->data_locacao);
            $stmt->execute();
        }
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
        $sql = "SELECT * FROM locacaoes WHERE locacao_id = :locacao_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':locacao_id', $locacao_id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\LocacaoModel");
    }

    public function delete(int $locacao_id)
    {
        $sql = "DELETE FROM locacoes WHERE locacao_id = :locacao_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':locacao_id', $locacao_id);
        $stmt->execute();
    }
}
