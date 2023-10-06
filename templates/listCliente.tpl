{extends file="template.tpl"}
{block name=listaClientes}
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