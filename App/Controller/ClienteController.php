<?php

// Controller é responsável por processar as requisições do usuário.
// Por exemplo, devolve uma View de formularios/listagem,
// Acessar um Model para buscar algum dado no banco,
// Redicirecionar para uma página,
// Ou até chamar outra controller.

namespace App\Controller;

use App\Model\ClienteModel;

class ClienteController extends Controller
{
    // Método index é usado para devolver a View de listagem.
    public static function index()
    {
        $model = new ClienteModel();
        // Obtém todos os registros e manda para a propriedade $row.
        $model->getAllRows();

        // Inclui o arquivo View de listagem
        parent::render('Cliente/ListaCliente', $model);
    }

    // Método form devolve um formulário para ser preenchido.
    public static function form()
    {
        // Cria uma instância do modelo ClienteModel.
        $model = new ClienteModel();

        // Verifica se foi passado um parâmetro 'cliente_id' na URL.
        if (isset($_GET['cliente_id']))
            // Se foi passado, obtém os dados do cliente correspondente ao ID.
            $model = $model->getById((int) $_GET['cliente_id']);

        // Inclui o arquivo que contém o formulário de cliente para exibição.
        parent::render('Cliente/FormCliente', $model);
    }

    //Método save, preenche um model com os dados do formulario e manda para o banco de dados.
    public static function save()
    {
        // Captura os dados preenchidos nos campos via POST.
        $model = new ClienteModel();
        $model->cliente_id = $_POST['cliente_id'];
        $model->nome = $_POST['nome'];
        $model->telefone = $_POST['telefone'];
        $model->email = $_POST['email'];

        // Depois que capturar os dados chama o método save.
        $model->save();

        // Após executar o save, redireciona o usuário para a listagem.
        header("Location: /Cliente");
    }

    // Método delete para excluir registros.
    public static function delete()
    {

        $model = new ClienteModel();

        // Busca o id do cadastro via GET.
        $model->delete((int)$_GET['cliente_id']);

        // Após deletar, redicireciona para a listagem.
        header("Location: /cliente");
    }
}
