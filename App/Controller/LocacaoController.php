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
        $model->getAllQuartos();


        if (isset($_GET['locacao_id'])) {
            $locacao_id = (int)$_GET['locacao_id'];
            $model = $model->getById($locacao_id);
        }
        
        parent::render('Locacao/FormLocacao', $model);

    }

    public static function save()
    {
        $model = new LocacaoModel();
        $model->locacao_id = $_POST['locacao_id'];
        $model->quarto_id = $_POST['quarto_id'];
        $model->cliente_id = $_POST['cliente_id'];
        $model->data = $_POST['data'];

        $model->save();

        header("Location: /Locacao");
    }

    public static function delete()
    {
        $model = new LocacaoModel();

        $model->delete((int)$_GET['locacao_id']);

        header("Location: /Locacao");
    }
}
