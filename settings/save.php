<?php
switch ($_REQUEST['acao']) {
    case 'cadastrarClient':
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        $sql = "INSERT INTO clientes
         (nome, telefone, email)
         VALUES('$nome', '$telefone', '$email')";

        $res = mysqli_query($conn, $sql);

        if ($res === true) {
            echo "<script>alert('Você foi cadastrado com sucesso!');</script>";
            echo "<script>location.href='?page=list_clients';</script>";
        } else {
            echo "Erro ao cadastrar: " . mysqli_error($conn);
        }
        break;

    case 'cadastrarRoom':
        $numero = $_POST['number'];
        $condicaoQuarto = $_POST['condicaoQuarto'];
        $ocupado = ($condicaoQuarto == 'Sim') ? 1 : 0;
        $valor = $_POST['val'];

        $sql = "INSERT INTO quartos
                    (numero, ocupado, valor)
                    VALUES('$numero', '$ocupado', '$valor')";

        $res = mysqli_query($conn, $sql);

        if ($res === true) {
            echo "<script>alert('Quarto cadastrado com sucesso!');</script>";
            echo "<script>location.href='?page=list_rooms';</script>";
        } else {
            echo "Erro ao cadastrar: " . mysqli_error($conn);
        }
        break;

        case 'newReserva':
            $sql = "INSERT INTO locacoes(
                    quarto_id,
                    cliente_id,
                    data
                ) VALUES(
                    " . $_POST['quarto_id'] . ",
                    '" . $_POST['cliente_id'] . "',
                    '" . $_POST['data_locacao'] . "'
                )";
        
            $res = $conn->query($sql);
        
            if ($res === true) {
                echo "<script>alert('Nova reserva foi cadastrada com sucesso!');</script>";
                echo "<script>location.href='?page=list_reservas';</script>";
            } else {
                echo "Erro ao cadastrar: " . mysqli_error($conn);
            }
            break;        

    case 'editRooms';
        $numero = $_POST['number'];
        $ocupado = $_POST['ocupado'];
        $valor = $_POST['val'];


        $sql = "UPDATE quartos SET
                    numero = '$numero',
                    ocupado = '$ocupado',
                    valor = '$valor'
                WHERE
                   quarto_id = " . $_REQUEST["id"];

        $res = mysqli_query($conn, $sql);

        if ($res === true) {
            echo "<script>alert('Quarto editado com sucesso!');</script>";
            echo "<script>location.href='?page=list_rooms';</script>";
        } else {
            echo "Erro ao editar: " . mysqli_error($conn);
        }

        break;

    case 'editClients';
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        $sql = "UPDATE clientes SET
                    nome = '$nome',
                    telefone = '$telefone',
                    email = '$email'
                WHERE
                    cliente_id = " . $_REQUEST["id"];

        $res = mysqli_query($conn, $sql);

        if ($res === true) {
            echo "<script>alert(Quarto foi editado com sucesso!');</script>";
            echo "<script>location.href='?page=list_clients';</script>";
        } else {
            echo "Erro ao editar: " . mysqli_error($conn);
        }

        break;

    case 'excluirCliente';
        $sql = "DELETE FROM clientes 
        WHERE cliente_id=" . $_REQUEST["id"];

        $res = mysqli_query($conn, $sql);

        if ($res === true) {
            echo "<script>alert('Excluido com sucesso!');</script>";
            echo "<script>location.href='?page=list_clients';</script>";
        } else {
            echo "Erro ao excluir: " . mysqli_error($conn);
        }

        break;

    case 'excluirQuarto';
        $sql = "DELETE FROM quartos 
        WHERE quarto_id=" . $_REQUEST["quarto_id"];

        $res = mysqli_query($conn, $sql);

        if ($res === true) {
            echo "<script>alert('Excluido com sucesso!');</script>";
            echo "<script>location.href='?page=list_rooms';</script>";
        } else {
            echo "Erro ao excluir: " . mysqli_error($conn);
        }
        break;

        case 'excluirReserva';
        $sql = "DELETE FROM locacoes 
        WHERE locacao_id=" . $_REQUEST["locacao_id"];

        $res = mysqli_query($conn, $sql);

        if ($res === true) {
            echo "<script>alert('Excluido com sucesso!');</script>";
            echo "<script>location.href='?page=list_reservas';</script>";
        } else {
            echo "Erro ao excluir: " . mysqli_error($conn);
        }
        break;
}
