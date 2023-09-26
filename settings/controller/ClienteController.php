<?php
require_once __DIR__ . '/../view/NewClient.php';
require_once __DIR__ . '/../dao/ClienteDao.php';


class ClienteController
{
    private $clienteDao;
   

    public function cadastrarCliente()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
            if ($_POST['acao'] === 'NewClient') {
                $cliente = new Cliente();
                $cliente->setNome($_POST['nome']);
                $cliente->setTelefone($_POST['telefone']);
                $cliente->setEmail($_POST['email']);

                if ($this->clienteDao->cadastrarCliente($cliente)) {
                    echo "<script>alert('Você foi cadastrado com sucesso!');</script>";
                    echo "<script>location.href='?page=ListClients';</script>";
                }
            }
        }
    }

    public function listarClientes()
    {
        $clientes = $this->clienteDao->listarClientes();
        if ($clientes) {
            echo "<h2>Lista de Clientes</h2>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Nome</th><th>Telefone</th><th>Email</th></tr>";
            foreach ($clientes as $cliente) {
                echo "<tr>";
                echo "<td>{$cliente['cliente_id']}</td>";
                echo "<td>{$cliente['nome']}</td>";
                echo "<td>{$cliente['telefone']}</td>";
                echo "<td>{$cliente['email']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum cliente encontrado.";
        }
    }
}

?>