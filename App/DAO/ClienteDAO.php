<?php

// DAO é repsonsável por executar os comandos de SQL junto ao banco de dados.
// Inserir, atualizar, listar, excluir dados do banco de dados.

namespace App\DAO;

use App\Model\ClienteModel;
use \PDO;


class ClienteDAO extends DAO
{

    // Construtor que está com as configurações de conexão com o banco.
    // Para realizar a conexão automática com o banco sempre que executar uma função de SQL.
    public function __construct()
    {
        parent::__construct();
    }

    // Método insert para inserir novos clientes no banco de dados.
    public function insert(ClienteModel $model)
    {
        // Insert na tabela de clientes usando Prepared Statement
        // para prevenir injeção de SQL.
        $sql = "INSERT INTO clientes (nome, telefone, email) VALUES (:nome, :telefone, :email)";

        // Prepara a consulta SQL atráves do objeto PDO.
        $stmt = $this->pdo->prepare($sql);

        // Vincula os valores com os parametros do modelo.
        $stmt->bindValue(':nome', $model->nome);
        $stmt->bindValue(':telefone', $model->telefone);
        $stmt->bindValue(':email', $model->email);

        // Executa a consulta preparada e retorna o resultado da operação.
        return $stmt->execute();
    }

    // Método update atualiza os dados de um cadastro selecionado.
    public function update(ClienteModel $model)
    {
        // Atualiza as colunas da tabela cliente de acordo com o cliente_id recebido. 
        $sql = "UPDATE clientes SET nome = :nome, telefone = :telefone, email = :email WHERE cliente_id = :clienteId";

        // Prepara a consulta SQL atráves do objeto PDO.
        $stmt = $this->pdo->prepare($sql);

        // Vincula os valores com os parametros do modelo.
        $stmt->bindValue(':nome', $model->nome);
        $stmt->bindValue(':telefone', $model->telefone);
        $stmt->bindValue(':email', $model->email);
        $stmt->bindValue(':clienteId', $model->clienteId);

        // Executa a consulta preparada e retorna o resultado da operação.
        return $stmt->execute();
    }

    // Método para busca todos os dados da tabela.
    public function selectClientes()
    {
        $sql = "SELECT * FROM clientes";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        // fetchAll é utilizado para buscar multiplas linhas de um conjunto de resultados.
        // FETCH_CLASS é utilizado como argumento para retornar as linhas do resultado
        // como instâncias da classe.
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    // Método utilizado para retornar um registro específico da tabela.
    public function selectByID(int $clienteId)
    {
        $sql = "SELECT * FROM clientes WHERE cliente_id = :clienteId";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':clienteId', $clienteId);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\ClienteModel");
    }

    // Método utilizado para remover um registro da tabela.
    public function delete(int $clienteId)
    {
        $sql = "DELETE FROM clientes WHERE cliente_id = :clienteId";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':clienteId', $clienteId);

        $stmt->execute();
    }

    // Note que todas as consultas são preparadas, evitando uma injeção de SQL.
}
