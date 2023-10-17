<?php

namespace App\Model;

use App\DAO\LocacaoDAO;

class LocacaoModel extends Model
{

    public $locacaoId, $quartoId, $clienteId, $data;


    public function save()
    {
        $dao = new LocacaoDAO();

        $dao->insert($this);
    }

    public function getAllClients()
    {
        $dao = new LocacaoDAO();

        $this->rows = $dao->selectClientes();
    }

    public function getAllQuartos()
    {
        $dao = new LocacaoDAO();

        $this->rows = $dao->selectQuartos();
    }

    public function getAllRows()
    {
        $dao = new LocacaoDAO();
        $this->rows = $dao->select();
    }

    public function getById(int $locacaoId)
    {
        $dao = new LocacaoDAO();

        $obj = $dao->selectByID($locacaoId);

        return ($obj) ? $obj : new LocacaoModel();
    }

    public function delete(int $locacaoId)
    {
        $dao = new LocacaoDAO();

        $dao->delete($locacaoId);
    }
}
