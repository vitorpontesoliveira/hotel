<?php
require 'Config.php';

switch ($_REQUEST['acao']) {
    case 'NewClient':
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        try {
            $sql = "INSERT INTO clientes (nome, telefone, email) VALUES(:nome, :telefone, :email)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            echo "<script>alert('Você foi cadastrado com sucesso!');</script>";
            echo "<script>location.href='?page=ListClients';</script>";
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: " . $e->getMessage();
        }
        break;

    case 'NewRoom':
        $numero = $_POST['number'];
        $condicaoQuarto = $_POST['condicaoQuarto'];
        $ocupado = ($condicaoQuarto == 'Sim') ? 1 : 0;
        $valor = $_POST['val'];

        try {
            $sql = "INSERT INTO quartos (numero, ocupado, valor) VALUES(:numero, :ocupado, :valor)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':numero', $numero);
            $stmt->bindParam(':ocupado', $ocupado);
            $stmt->bindParam(':valor', $valor);
            $stmt->execute();

            echo "<script>alert('Quarto cadastrado com sucesso!');</script>";
            echo "<script>location.href='?page=ListRooms';</script>";
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: " . $e->getMessage();
        }
        break;

    case 'NewReserv':
        $quarto_id = $_POST['quarto_id'];
        $cliente_id = $_POST['cliente_id'];
        $data_locacao = $_POST['data_locacao'];

        try {
            $sql_check = "SELECT COUNT(*) FROM locacoes WHERE quarto_id = :quarto_id AND data = :data_locacao";
            $stmt_check = $pdo->prepare($sql_check);
            $stmt_check->bindParam(':quarto_id', $quarto_id);
            $stmt_check->bindParam(':data_locacao', $data_locacao);
            $stmt_check->execute();
            $num_reservas = $stmt_check->fetchColumn();

            if ($num_reservas > 0) {
                echo "<script>alert('Este quarto já está reservado para a data especificada. Por favor, escolha outra data ou quarto.');</script>";
                echo "<script>window.history.back();</script>";
            } else {
                $sql = "INSERT INTO locacoes (quarto_id, cliente_id, data) VALUES(:quarto_id, :cliente_id, :data_locacao)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':quarto_id', $quarto_id);
                $stmt->bindParam(':cliente_id', $cliente_id);
                $stmt->bindParam(':data_locacao', $data_locacao);
                $stmt->execute();

                echo "<script>alert('Nova reserva foi cadastrada com sucesso!');</script>";
                echo "<script>location.href='?page=ListReserv';</script>";
            }
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: " . $e->getMessage();
        }
        break;


    case 'EditRooms':
        $quarto_id = $_REQUEST['id'];
        $numero = $_POST['number'];
        $ocupado = $_POST['ocupado'];
        $valor = $_POST['val'];

        try {
            $sql = "UPDATE quartos SET numero = :numero, ocupado = :ocupado, valor = :valor WHERE quarto_id = :quarto_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':numero', $numero);
            $stmt->bindParam(':ocupado', $ocupado);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':quarto_id', $quarto_id);
            $stmt->execute();

            echo "<script>alert('Quarto editado com sucesso!');</script>";
            echo "<script>location.href='?page=ListRooms';</script>";
        } catch (PDOException $e) {
            echo "Erro ao editar: " . $e->getMessage();
        }
        break;

    case 'EditClients':
        $cliente_id = $_REQUEST['id'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        try {
            $sql = "UPDATE clientes SET nome = :nome, telefone = :telefone, email = :email WHERE cliente_id = :cliente_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cliente_id', $cliente_id);
            $stmt->execute();

            echo "<script>alert('Cliente foi editado com sucesso!');</script>";
            echo "<script>location.href='?page=ListClients';</script>";
        } catch (PDOException $e) {
            echo "Erro ao editar: " . $e->getMessage();
        }
        break;

    case 'DeleteClient':
        $cliente_id = $_REQUEST['cliente_id'];

        try {
            $sql = "DELETE FROM clientes WHERE cliente_id = :cliente_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':cliente_id', $cliente_id);
            $stmt->execute();

            echo "<script>alert('Excluído com sucesso!');</script>";
            echo "<script>location.href='?page=ListClients';</script>";
        } catch (PDOException $e) {
            echo "Erro ao excluir: " . $e->getMessage();
        }
        break;

    case 'DeleteRoom':
        $quarto_id = $_REQUEST['quarto_id'];

        try {
            $sql = "DELETE FROM quartos WHERE quarto_id = :quarto_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':quarto_id', $quarto_id);
            $stmt->execute();

            echo "<script>alert('Excluído com sucesso!');</script>";
            echo "<script>location.href='?page=ListRooms';</script>";
        } catch (PDOException $e) {
            echo "Erro ao excluir: " . $e->getMessage();
        }
        break;

    case 'DeleteReservs':
        $locacao_id = $_REQUEST['locacao_id'];

        try {
            $sql = "DELETE FROM locacoes WHERE locacao_id = :locacao_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':locacao_id', $locacao_id);
            $stmt->execute();

            echo "<script>alert('Excluído com sucesso!');</script>";
            echo "<script>location.href='?page=ListReservs';</script>";
        } catch (PDOException $e) {
            echo "Erro ao excluir: " . $e->getMessage();
        }
        break;
}
