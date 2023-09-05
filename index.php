<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Cadastrar</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?page=newClient">Clientes</a></li>
                        <li><a class="dropdown-item" href="?page=newRoom">Quartos</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Listar</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?page=list_clients">Clientes</a></li>
                        <li><a class="dropdown-item" href="?page=list_rooms">Quartos</a></li>
                    </ul>
                </li>
        </div>
    </nav>

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
    }
    ?>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>