<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../settings/css/Styles.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg cornav">
        <div class="container-fluid">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button"
                        aria-expanded="false">Quartos</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="formQuarto.php">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="formLocacao.php">Reservar</a></li>
                        <li><a class="dropdown-item" href="#">Listar quartos</a></li>
                        <li><a class="dropdown-item" href="#">Listar reservas</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button"
                        aria-expanded="false">Clientes</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="formCliente.php">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="#">Listar</a></li>

                    </ul>
                </li>
        </div>
    </nav>
    <div class="container mt-5">
        {block name=cadastroQuarto}{/block}
        {block name=cadastroCliente}{/block}
        {block name=cadastroLocacao}{/block}    
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>