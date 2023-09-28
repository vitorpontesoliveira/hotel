<?php

namespace App\Controller;

use App\Model\QuartoModel;

class QuartoController extends Controller
{
    public static function index()
    {
        $model = new QuartoModel();
        $model->getAllRows();

        parent::render('Quarto/ListaQuarto', $model);
    }

    public static function form()
    {

        $model = new QuartoModel();

        if (isset($_GET['quarto_id']))

            $model = $model->getById((int) $_GET['quarto_id']);

        include 'View/Modules/Quarto/FormQuarto.php';
    }


    public static function save()
    {
        $model = new QuartoModel();
        $model->quarto_id = $_POST['quarto_id'];
        $model->ocupado = ($_POST['ocupado'] === 'Sim');
        $model->numero = $_POST['numero'];
        $model->valor = $_POST['valor'];
        var_dump($model);

        $model->save();

        header("Location: /quarto");
    }

    public static function delete()
    {

        $model = new QuartoModel();

        $model->delete((int)$_GET['quarto_id']);

        header("Location: /quarto");
    }
}
