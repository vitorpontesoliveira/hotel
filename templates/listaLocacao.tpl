{extends file="template.tpl"}
{block name=main}
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="6">
                    <h2 class="text-center">Lista de reservas</h2>
                </th>
            </tr>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>N° Quarto</th>
                <th>Data</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            {foreach $rows as $item}

                <tr>
                    <td>
                        {$item->locacao_id}
                    </td>
                    <td>
                        {$item->cliente_nome}
                    </td>
                    <td>
                        {$item->numero_quarto}
                    </td>
                    <td>
                        {$item->data_formatada}
                    </td>

                    <td><a href="/locacao/delete?locacao_id={$item->locacao_id}" class='btn btn-danger'>Excluir</a></td>
                </tr>
            {/foreach}

        </tbody>
    </table>
{/block}