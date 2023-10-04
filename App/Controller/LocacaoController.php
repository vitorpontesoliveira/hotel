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
        $model->getAllClients();
        $model2 = new LocacaoModel();
        $model2->getAllQuartos();

        if (isset($_GET['locacao_id'])) {
            $locacao_id = (int)$_GET['locacao_id'];
            $model = $model->getById($locacao_id);
        }

        parent::render('Locacao/FormLocacao', $model, $model2);

    }

    public static function save()
    {
        $model = new LocacaoModel();
        $model->locacao_id = $_POST['locacao_id'];
        $model->cliente_id = $_POST['cliente_id'];
        $model->quarto_id = $_POST['quarto_id'];
        $model->data = $_POST['data_locacao'];
        var_dump($model);

        $model->save();

        header("Location: /locacao");
    }

    public static function delete()
    {
        $model = new LocacaoModel();

        $model->delete((int)$_GET['locacao_id']);

        header("Location: /locacao");
    }
}
