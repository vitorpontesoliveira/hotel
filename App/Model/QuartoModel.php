<?php

namespace App\Model;

use App\DAO\QuartoDAO;

class QuartoModel extends Model
{

    public $quartoID, $numero, $ocupado, $valor;

    public function save()
    {
        $dao = new QuartoDAO();

        if (empty($this->quartoID)) {
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }

    public function getAllRooms()
    {
        $dao = new QuartoDAO();

        $this->rows = $dao->selectQuartos();
    }

    public function getById(int $quartoId)
    {
        $dao = new QuartoDAO();

        $obj = $dao->selectByID($quartoId);

        return ($obj) ? $obj : new QuartoModel();
    }

    public function delete(int $quartoId)
    {
        $dao = new QuartoDAO();

        $dao->delete($quartoId);
    }
}
