<?php

namespace App\Controller;

use App\Model\LocacaoModel;

class LocacaoController extends Controller
{
    public static function index()
    {
        $model = new LocacaoModel();
        $model->getAllRows();

        parent::render('Locacao/ListaLocacao', $model);
    }

    public static function form()
    {

        $model = new LocacaoModel();

        if (isset($_GET['locacao_id']))

            $model = $model->getById((int) $_GET['locacao_id']);

        include 'View/Modules/Locacao/FormLocacao.php';
    }

    public static function save()
    {
        $model = new LocacaoModel();
        $model->locacao_id = $_POST['locacao_id'];
        $model->quarto_id = $_POST['quarto_id'];
        $model->cliente_id = $_POST['cliente_id'];
        $model->data_locacao = $_POST['data_locacao'];

        $model->save();

        header("Location: /Locacao");
    }

    public static function delete()
    {

        $model = new LocacaoModel();

        $model->delete((int)$_GET['locacao_id']);

        header("Location: /ListaLocacao");
    }
}
