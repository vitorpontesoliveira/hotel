<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Styles.css">
</head>

<body>
    <div class="container mt-5">
        <div class="border p-4 mx-auto bg-white" style="max-width: 400px;">
            <h2 class="text-center">Cadastros de Cliente</h2>
            <form action="/cliente/form/save" method="post">
                <input type="hidden" value="<?= $model->cliente_id ?>" name="cliente_id">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" value="<?= $model->nome ?>" class="form-control" name="nome" id="nome" placeholder="Nome completo" oninput="validarNome()" required>
                    <span id="nomeErro" style="color: red;"></span>
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="tel" value="<?= $model->telefone ?>" class="form-control" name="telefone" id="telefone" placeholder="(DDD)_____-____" pattern="\d{10,}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" value="<?= $model->email ?>" class="form-control" name="email" id="email" placeholder="example@hotmail.com" required>
                </div>
                <div class="text-center">
                    <input type="submit" value="Cadastrar" class="btn btn-primary">
                    <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="css/scripts.js"></script>
</body>

</html>