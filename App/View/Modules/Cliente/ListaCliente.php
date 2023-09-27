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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="6">
                        <h2 class="text-center">Lista de Clientes</h2>
                    </th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($model->rows as $item) : ?>

                    <tr>
                        <td><?= $item->cliente_id ?></td>
                        <td><?= $item->nome ?></td>
                        <td><?= $item->telefone ?></td>
                        <td><?= $item->email ?></td>
                        <td><button><a href="/cliente/form?cliente_id=<?= $item->cliente_id ?>">Editar</a></button>
                        </td>
                        <td><button><a href="/cliente/delete?cliente_id=<?= $item->cliente_id ?>">Excluir</a></button></td>
                    </tr>
                <?php endforeach ?>

                <?php if (count($model->rows) == 0) : ?>
                    <tr>
                        <td colspan="5">Nenhum registro encontrado.</td>
                    </tr>
                <?php endif ?>

            </tbody>

        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="css/scripts.js"></script>
</body>

</html>