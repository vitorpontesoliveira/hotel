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
            <h2 class="text-center">Nova locação</h2>
            <form action="?page=Save" method="post">
                <input type="hidden" value="<?= $model->locacao_id ?>" name="locacao_id">
                <div class="mb-3">
                    <label for="cliente_id" class="form-label">Nome do Cliente</label>
                    <select class="form-select" id="cliente_id" name="cliente_id" required>
                        <option value="" disabled selected>Escolha um cliente</option>
                        <?php
                        $sql = "SELECT cliente_id, nome FROM clientes";
                        $cliente_id = $item['cliente_id'];
                        $nome = $item['nome'];
                        echo "<option value='$cliente_id'>$cliente_id - $nome</option>";
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="quarto_id" class="form-label">Numero do quarto</label>
                    <select class="form-select" id="quarto_id" name="quarto_id" required>
                        <option value="" disabled selected>Escolha um quarto</option>
                        <?php
                        $sql = "SELECT quarto_id, numero FROM quartos";
                        $quarto_id = $item['quarto_id'];
                        $numero = $item['numero'];
                        echo "<option value='$quarto_id'>$numero</option>";
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="data_locacao" class="form-label">Data da Locação</label>
                    <input type="date" class="form-control" id="data_locacao" name="data_locacao" required>
                </div>
                <div class="text-center">
                    <br>
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