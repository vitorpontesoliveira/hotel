<?php

// O Model é responsável por transportar os dados do Controller até o DAO, e vice-virsa,
// valida os dados da View e controla o acesso aos métodos da DAO.

namespace App\Model;

use App\DAO\ClienteDAO;
use \PDO;

class ClienteModel extends Model
{

    // Declaração das propriedades conforme a tabela existente no banco de dados.
    public $cliente_id, $nome, $telefone, $email;

    // Declaração do metódo save que vai chamar a DAO para gravar os dados no banco.
    public function save()
    {
        $dao = new ClienteDAO();

        // Verificação se a propriedade de ID foi preenchida.
        if (empty($this->cliente_id)) {
            // Se não houver ID, chama o método insert.
            $dao->insert($this);
        } else {
            //Se houver ID, chama o método update.
            $dao->update($this);
        }
    }

    // Método que encapsula a chamada DAO e preenche as proprieades $rows
    public function getAllRows()
    {
        $dao = new ClienteDAO();

        // preenchimento das propieades $row com dados do banco através da consultas SQL
        // que estão na DAO.
        $this->rows = $dao->selectClientes();
    }

    // Método que encapsula o acesso ao método selectById da camada DAO
    // O método recebe um parâmetro do tipo inteiro que é o id do registro, via camada DAO.
    public function getById(int $cliente_id)
    {
        $dao = new ClienteDAO();

        // obtém um model preenchido da camada DAO.
        $obj = $dao->selectByID($cliente_id);

        // Verifica se foi preenchido, se não retorna um novo.
        return ($obj) ? $obj : new ClienteModel();
    }

    // Método que encapsula o acesso DAO do método delete.
    // O método recebe um valor inteiro que é o id do cliente.
    public function delete(int $cliente_id)
    {
        $dao = new ClienteDAO();

        $dao->delete($cliente_id);
    }
}
