<?php

namespace App\Controller;

use App\Model\ClienteModel;

class ClienteController extends Controller
{
    public static function index()
    {
        $model = new ClienteModel();
        $model->getAllRows();

        parent::render('Cliente/ListaCliente', $model);
    }

    public static function form()
    {

        $model = new ClienteModel();

        if (isset($_GET['cliente_id']))

            $model = $model->getById((int) $_GET['cliente_id']);

        include 'View/Modules/Cliente/FormCliente.php';
    }

    public static function save()
    {
        $model = new ClienteModel();
        $model->cliente_id = $_POST['cliente_id'];
        $model->nome = $_POST['nome'];
        $model->telefone = $_POST['telefone'];
        $model->email = $_POST['email'];

        $model->save();

        header("Location: /Cliente");
    }

    public static function delete()
    {

        $model = new ClienteModel();

        $model->delete((int)$_GET['cliente_id']);

        header("Location: /cliente");
    }
}
