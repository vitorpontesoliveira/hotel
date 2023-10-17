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
    public function index()
    {
        $params = new ClienteModel();
        // Obtém todos os registros e manda para a propriedade $row.
        $params->getAllClients();

        // Inclui o arquivo View de listagem
        $this->render('listaCliente', ['params' => $params]);
    }

    // Método form devolve um formulário para ser preenchido.
    public function form()
    {
        // Cria uma instância do modelo ClienteModel.
        $params = new ClienteModel();

        // Verifica se foi passado um parâmetro 'cliente_id' na URL.
        if (isset($_GET['clienteId']))
            // Se foi passado, obtém os dados do cliente correspondente ao ID.
            $params = $params->getById((int) $_GET['clienteId']);

        // Inclui o arquivo que contém o formulário de cliente para exibição.
        $this->render('formCliente', ['params' => $params]);
    }

    //Método save, preenche um model com os dados do formulario e manda para o banco de dados.
    public function save()
    {
        // Captura os dados preenchidos nos campos via POST.
        $model = new ClienteModel();
        $model->clienteId = $_POST['clienteId'];
        $model->nome = $_POST['nome'];
        $model->telefone = $_POST['telefone'];
        $model->email = $_POST['email'];

        // Depois que capturar os dados chama o método save.
        $model->save();

        // Após executar o save, redireciona o usuário para a listagem.
        header("Location: /cliente");
    }

    // Método delete para excluir registros.
    public function delete()
    {

        $model = new ClienteModel();

        // Busca o id do cadastro via GET.
        $model->delete((int)$_GET['clienteId']);

        // Após deletar, redicireciona para a listagem.
        header("Location: /cliente");
    }
}
