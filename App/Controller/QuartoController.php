<?php

namespace App\Controller;

use App\Model\QuartoModel;

class QuartoController extends Controller
{
    public function index()
    {
        $model = new QuartoModel();
        $model->getAllRows();

        $this->render('listaQuarto', $model);
    }

    public function form()
    {
        $model = new QuartoModel();

        if (isset($_GET['quarto_id'])) {
            $model = $model->getById((int)$_GET['quarto_id']);
        }

        $this->render('formQuarto', $model);
    }

    public function save()
    {
        $model = new QuartoModel();
        $model->quarto_id = $_POST['quarto_id'];
        $model->ocupado = ($_POST['ocupado'] === 'Sim') ? 1 : 0;
        $model->numero = $_POST['numero'];
        $model->valor = $_POST['valor'];

        $model->save();

        header("Location: /quarto");
    }

    public function delete()
    {
        $model = new QuartoModel();

        $model->delete((int)$_GET['quarto_id']);

        header("Location: /quarto");
    }
}
