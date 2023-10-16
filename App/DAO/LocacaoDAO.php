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
        // Verificar se já existe uma reserva para o mesmo quarto na mesma data
        $sql_check = "SELECT COUNT(*) FROM locacoes WHERE quarto_id = :quartoId AND data = :data_locacao";
        $stmt_check = $this->pdo->prepare($sql_check);
        $stmt_check->bindParam(':quartoId', $model->quartoId);
        $stmt_check->bindParam(':data_locacao', $model->data);
        $stmt_check->execute();
        $num_reservas = $stmt_check->fetchColumn();

        if ($num_reservas > 0) {
            // Já existe uma reserva para o mesmo quarto na mesma data
            $mensagem = "Este quarto já está reservado para a data especificada. Por favor, escolha outra data ou quarto.";
            echo "<script>alert('$mensagem');</script>";

            // Adicionando um pequeno atraso antes do redirecionamento
            echo "<script>document.location.href='/locacao/form';</script>";

            return false; // Por exemplo, retornar false para indicar que a inserção falhou
        }

        // Se não houver reservas existentes, proceda com a inserção
        $sql_insert = "INSERT INTO locacoes (cliente_id, quarto_id, data) VALUES (:cliente_id, :quartoId, :data)";
        $stmt_insert = $this->pdo->prepare($sql_insert);

        $stmt_insert->bindValue(':cliente_id', $model->clienteId);
        $stmt_insert->bindValue(':quartoId', $model->quartoId);
        $stmt_insert->bindValue(':data', $model->data);

        if ($stmt_insert->execute()) {
            echo "<script>alert('Nova reserva foi cadastrada com sucesso!');</script>";
            header("Location: /locacao");
            return true; // Indica que a inserção foi bem-sucedida
        } else {
            // Se ocorrer um erro durante a inserção, você pode tratar de acordo
            $mensagemErro = "Erro ao cadastrar a reserva. Por favor, tente novamente.";
            echo "<script>alert('$mensagemErro');</script>";
            return false; // Indica que a inserção falhou
        }
    }


    public function update(LocacaoModel $model)
    {
        // Atualiza as colunas da tabela cliente de acordo com o cliente_id recebido. 
        $sql = "UPDATE locacoes SET cliente_id = :cliente_id, quarto_id = :quartoId, data = :data WHERE locacao_id = :locacao_id";

        // Prepara a consulta SQL atráves do objeto PDO.
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':clienteId', $model->clienteId);
        $stmt->bindValue(':quartoId', $model->quartoId);
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
        $sql = "SELECT quarto_id, numero FROM quartos";

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

    public function selectByID(int $locacaoId)
    {
        $sql = "SELECT * FROM locacoes WHERE locacao_id = :locacaoId";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':locacaoId', $locacaoId);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\ClienteModel");
    }

    public function delete(int $locacaoId)
    {
        $sql = "DELETE FROM locacoes WHERE locacao_id = :locacao_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':locacaoId', $locacaoId);
        $stmt->execute();
    }
}
