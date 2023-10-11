<?php

namespace App\Controller;

use App\Model\LocacaoModel;
use App\Model\ClienteModel;
use App\Model\QuartoModel;


class LocacaoController extends Controller
{
    public function index()
    {
        $data = new LocacaoModel();
        $data->getAllRows();

        $this->render('listaLocacao', $data);
    }

    public function form()
    {
        $data = new LocacaoModel();
        $dataC = new ClienteModel();
        $dataQ = new QuartoModel();

        $dataC->getAllClients();
        $dataQ->getAllRooms();

        if (isset($_GET['locacao_id'])) {
            $locacao_id = (int)$_GET['locacao_id'];
            $data = $data->getById($locacao_id);
        }

        $this->render('formLocacao', ['data' => $data, 'dataC' => $dataC, 'dataQ' => $dataQ]);
    }


    public function save()
    {
        $model = new LocacaoModel();
        $model->locacao_id = $_POST['locacao_id'];
        $model->clienteId = $_POST['clienteId'];
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
