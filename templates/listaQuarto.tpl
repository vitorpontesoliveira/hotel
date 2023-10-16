{extends file="template.tpl"}
{block name=main}
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="6">
                    <h2 class="text-center">Lista de Quartos</h2>
                </th>
            </tr>
            <tr>
                <th>#</th>
                <th>Ocupado</th>
                <th>Numero</th>
                <th>Valor</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            {foreach $params->rows as $item}
                <tr>
                    <td>{$item->quarto_id}</td>
                    <td>{if $item->ocupado == 1}Sim{else}Não{/if}</td>
                    <td>{$item->numero}</td>
                    <td>{$item->valor}</td>
                    <td><a href="formQuarto?quarto_id={$item->quarto_id}" class='btn btn-primary'>Editar</a></td>
                    <td><a href="/quarto/delete?quarto_id={$item->quarto_id}" class='btn btn-danger'>Excluir</a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
{/block}