<?php

namespace App\Model;

use App\DAO\ClienteDAO;

class ClienteModel extends Model
{

    public $cliente_id, $nome, $telefone, $email;


    public function save()
    {
        $dao = new ClienteDAO();

        if (empty($this->cliente_id)) 
        {
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }

    public function getAllRows()
    {
        $dao = new ClienteDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $cliente_id)
    {
        $dao = new ClienteDAO();

        $obj = $dao->selectByID($cliente_id);

        return ($obj) ? $obj : new ClienteModel();
    }

    public function delete(int $cliente_id)
    {
        $dao = new ClienteDAO();

        $dao->delete($cliente_id);
    }
}
