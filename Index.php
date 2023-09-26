<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Styles.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg cornav">
        <div class="container-fluid">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Quartos</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?action=NewRoom">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="index.php?action=NewReserv">Reservar</a></li>
                        <li><a class="dropdown-item" href="index.php?action=ListRooms">Listar quartos</a></li>
                        <li><a class="dropdown-item" href="index.php?action=ListReserv">Listar reservas</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Clientes</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?action=NewClient">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="?action=ListClients">Listar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container">
        <?php
        
        include("settings/Config.php");

        // Verifique se há uma página específica solicitada (usando um parâmetro "page")
        $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';

        // Crie um controlador principal para lidar com as solicitações
        // include('settings/controller/MainController.php');
        // $mainController = new MainController($pdo);

        $action = isset($_GET['action']) ? $_GET['action'] : '';

        switch ($action) {
            // case 'NewRoom':
            //     // Chame o método correspondente do controlador
            //     $mainController->handleNewRoomRequest();
            //     break;
            // case 'NewReserv':
            //     // Chame o método correspondente do controlador
            //     $mainController->handleNewReservRequest();
            //     break;
            // case 'ListRooms':
            //     // Chame o método correspondente do controlador
            //     $mainController->handleListRoomsRequest();
            //     break;
            // case 'ListReserv':
            //     // Chame o método correspondente do controlador
            //     $mainController->handleListReservRequest();
            //     break;
            case 'NewClient':
                // Chame o método correspondente do controlador
                $mainController->handleNewClientRequest();
                break;
            case 'ListClients':
                // Chame o método correspondente do controlador
                $mainController->handleListClientsRequest();
                break;
            default:
                // Ação padrão, talvez exiba uma mensagem de boas-vindas
                echo '<div class="welcome-text">Bem Vindo</div>';
                break;
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="css/scripts.js"></script>
</body>

</html>