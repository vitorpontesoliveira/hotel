<?php

namespace App\Controller;

use App\Model\QuartoModel;

class QuartoController extends Controller
{
    public function index()
    {
        $params = new QuartoModel();
        $params->getAllRooms();

        $this->render('listaQuarto', ['params' => $params]);
    }

    public function form()
    {
        $params = new QuartoModel();

        if (isset($_GET['quartoId'])) {
            $params = $params->getById((int)$_GET['quartoId']);
        }

        $this->render('formQuarto', ['params' => $params]);
    }


    public function save()
    {
        $params = new QuartoModel();
        $params->quartoID = $_POST['quartoId'];
        $params->ocupado = ($_POST['ocupado'] === 'Sim') ? 1 : 0;
        $params->numero = $_POST['numero'];
        $params->valor = $_POST['valor'];

        $params->save();

        header("Location: /quarto");
    }

    public function delete()
    {
        $params = new QuartoModel();

        $params->delete((int)$_GET['quartoId']);

        header("Location: /quarto");
    }
}
