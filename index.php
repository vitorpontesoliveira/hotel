<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

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
                        <li><a class="dropdown-item" href="?page=newRoom">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="?page=newReserva">Reservar</a></li>
                        <li><a class="dropdown-item" href="?page=list_rooms">Listar quartos</a></li>
                        <li><a class="dropdown-item" href="?page=list_reservas">Listar reservas</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Clientes</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?page=newClient">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="?page=list_clients">Listar</a></li>

                    </ul>
                </li>
        </div>
    </nav>

    <!-- Verifica se a página atual é index.php -->
    <?php
    if ($_SERVER['REQUEST_URI'] === '/hotel/index.php') {
        echo '<div class="airplane animate-plane"></div>';
        echo '<div class="welcome-text">Bem Vindo</div>';
    }
    ?>

    <?php
    include("config.php");
    switch (@$_REQUEST['page']) {
        case 'newClient':
            include('newClient.php');
            break;
        case 'newRoom';
            include('newRoom.php');
            break;
        case 'list_clients';
            include('list_clients.php');
            break;
        case 'list_rooms';
            include('list_rooms.php');
            break;
        case 'save';
            include('save.php');
            break;
        case 'editRooms';
            include('editRooms.php');
            break;
        case 'editClients';
            include('editClients.php');
            break;
        case 'newReserva';
            include('newLocacao.php');
            break;
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>