<?php

namespace App\Model;

use App\DAO\QuartoDAO;

class QuartoModel extends Model
{

    public $quarto_id, $numero, $ocupado, $valor;

    public function save()
    {
        $dao = new QuartoDAO();

        if (empty($this->quarto_id)) {
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }

    public function getAllRows()
    {
        $dao = new QuartoDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $quarto_id)
    {
        $dao = new QuartoDAO();

        $obj = $dao->selectByID($quarto_id);

        return ($obj) ? $obj : new QuartoModel();
    }

    public function delete(int $quarto_id)
    {
        $dao = new QuartoDAO();

        $dao->delete($quarto_id);
    }
}
