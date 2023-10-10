<?php

namespace App\Controller;

use App\Model\LocacaoModel;


class LocacaoController extends Controller
{
    public function index()
    {
        $model = new LocacaoModel();
        $model->getAllRows();

        $this->render('listaLocacao', $model);
    }

    public function form()
    {
        $model1 = new LocacaoModel();
        $model1->getAllClients();
        $model2 = new LocacaoModel();
        $model2->getAllQuartos();

        if (isset($_GET['locacao_id'])) {
            $locacao_id = (int)$_GET['locacao_id'];
            $model1 = $model1->getById($locacao_id);
        }

        $this->render('formLocacao', $model1, $model2);
    }

    public function save()
    {
        $model = new LocacaoModel();
        $model->locacao_id = $_POST['locacao_id'];
        $model->cliente_id = $_POST['cliente_id'];
        $model->quarto_id = $_POST['quarto_id'];
        $model->data = $_POST['data_locacao'];

        $model->save();

        header("Location: /locacao");
    }

    public function delete()
    {
        $model = new LocacaoModel();

        $model->delete((int)$_GET['locacao_id']);

        header("Location: /locacao");
    }
}
