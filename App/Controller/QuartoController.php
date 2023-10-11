<?php

namespace App\Controller;

use App\Model\QuartoModel;

class QuartoController extends Controller
{
    public function index()
    {
        $data = new QuartoModel();
        $data->getAllRooms();

        $this->render('listaQuarto', ['data' => $data]);
    }

    public function form()
    {
        $data = new QuartoModel();

        if (isset($_GET['quarto_id'])) {
            $data = $data->getById((int)$_GET['quarto_id']);
        }

        $this->render('formQuarto', ['data' => $data]);
    }


    public function save()
    {
        $data = new QuartoModel();
        $data->quartoID = $_POST['quarto_id'];
        $data->ocupado = ($_POST['ocupado'] === 'Sim') ? 1 : 0;
        $data->numero = $_POST['numero'];
        $data->valor = $_POST['valor'];

        $data->save();

        header("Location: /quarto");
    }

    public function delete()
    {
        $data = new QuartoModel();

        $data->delete((int)$_GET['quarto_id']);

        header("Location: /quarto");
    }
}
