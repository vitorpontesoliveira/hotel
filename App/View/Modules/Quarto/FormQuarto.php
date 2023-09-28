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
            <h2 class="text-center">Cadastro de Quartos</h2>
            <form action="/quarto/form/save" method="post">
                <input type="hidden" name="quarto_id" value="<?= $model->quarto_id ?>">
                <div class="mb-3">
                    <label for="numero" class="form-label">Número do quarto:</label>
                    <input type="number" class="form-control" name="numero" id="numero" placeholder="0" min="1" step="1" required>
                </div>
                <div class="form-group">
                    <label for="ocupado">O quarto está disponível?</label><br>
                    <input type="radio" name="ocupado" value=true required> Sim<br>
                    <input type="radio" name="ocupado" value=false required> Não
                </div>
                <div class="col-mb-3">
                    <label for="validationCustomUsername" class="form-label">Valor:</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">R$</span>
                        <input type="number" class="form-control" name="valor" id="valor" placeholder="Valor" step="0.01" required>
                    </div>
                </div>
                <div class="text-center mt-3">
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