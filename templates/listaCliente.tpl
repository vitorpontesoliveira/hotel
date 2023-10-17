{extends file="template.tpl"}
{block name=main}
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
            {foreach $params->rows as $item}
                <tr>
                    <td>{$item->cliente_id}</td>
                    <td>{$item->nome}</td>
                    <td>{$item->telefone}</td>
                    <td>{$item->email}</td>
                    <td><a href="formCliente?clienteId={$item->cliente_id}" class='btn btn-primary'>Editar</a></td>
                    <td><a href="/cliente/delete?clienteId={$item->cliente_id}" class='btn btn-danger'>Excluir</a></td>
                </tr>
            {/foreach}

        </tbody>
    </table>
{/block}