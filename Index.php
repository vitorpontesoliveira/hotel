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
                    <a class="nav-link active" aria-current="page" href="Index.php">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Quartos</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?page=NewRoom">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="?page=NewReserv">Reservar</a></li>
                        <li><a class="dropdown-item" href="?page=ListRooms">Listar quartos</a></li>
                        <li><a class="dropdown-item" href="?page=ListReserv">Listar reservas</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Clientes</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?page=NewClient">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="?page=ListClients">Listar</a></li>

                    </ul>
                </li>
        </div>
    </nav>

    <?php
    if ($_SERVER['REQUEST_URI'] === '/hotel/index.php') {
        echo '<div class="welcome-text">Bem Vindo</div>';
    }
    ?>

    <?php
    include("settings/Config.php");
    switch (@$_REQUEST['page']) {
        case 'NewClient':
            include('settings/NewClient.php');
            break;
        case 'NewReserv';
            include('settings/NewReserv.php');
            break;
        case 'NewRoom';
            include('settings/NewRoom.php');
            break;
        case 'ListClients';
            include('settings/ListClients.php');
            break;
        case 'ListRooms';
            include('settings/ListRooms.php');
            break;
        case 'ListReserv';
            include('settings/ListReservs.php');
            break;
        case 'Save';
            include('settings/Save.php');
            break;
        case 'EditRooms';
            include('settings/EditRooms.php');
            break;
        case 'EditClients';
            include('settings/EditClients.php');
            break;
        case 'EditLocation';
            include('settings/EditLocation.php');
            break;
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>