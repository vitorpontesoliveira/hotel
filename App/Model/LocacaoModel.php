<?php

namespace App\Model;

use App\DAO\LocacaoDAO;

class LocacaoModel extends Model
{

    public $locacao_id, $quarto_id, $cliente_id, $data_locacao;


    public function save()
    {
        $dao = new LocacaoDAO();

        if (empty($this->locacao_id)) 
        
            $dao->insert($this);
       
    }

    public function getAllRows()
    {
        $dao = new LocacaoDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $locacao_id)
    {
        $dao = new LocacaoDAO();

        $obj = $dao->selectByID($locacao_id);

        return ($obj) ? $obj : new LocacaoModel();
    }

    public function delete(int $locacao_id)
    {
        $dao = new LocacaoDAO();

        $dao->delete($locacao_id);
    }
}
