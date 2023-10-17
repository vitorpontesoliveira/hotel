<?php

namespace App\Controller;

use App\Model\LocacaoModel;
use App\Model\ClienteModel;
use App\Model\QuartoModel;

class LocacaoController extends Controller
{
    public function index()
    {
        $params = new LocacaoModel();
        $params->getAllRows();

        $this->render('listaLocacao', ['params' => $params]);
    }

    public function form()
    {
        $params = new LocacaoModel();
        $paramsC = new ClienteModel();
        $paramsQ = new QuartoModel();

        $paramsC->getAllClients();
        $paramsQ->getAllRooms();

        if (isset($_GET['locacao_id'])) {
            $locacaoId = (int)$_GET['locacao_id'];
            $params = $params->getById($locacaoId);
        }

        $this->render('formLocacao', ['params' => $params, 'paramsC' => $paramsC, 'paramsQ' => $paramsQ]);
    }

    public function save()
    {
        $model = new LocacaoModel();
        $model->locacaoId = $_POST['locacao_id'];
        $model->clienteId = $_POST['clienteId'];
        $model->quartoId = $_POST['quartoId'];
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
