{extends file="template.tpl"}
{block name=main}
    <div class="border p-4 mx-auto bg-white" style="max-width: 400px;">
        <h2 class="text-center">Nova locação</h2>
        <form action="formLocacao/save" method="post">
            <div class="mb-3">
                <label for="clienteId" class="form-label">Nome do Cliente</label>
                <select class="form-select" id="clienteId" name="clienteId" required>
                    <option value="" disabled selected>Escolha um cliente</option>
                    {foreach $paramsC->rows as $cliente}
                        <option value="{$cliente->cliente_id}">
                            {$cliente->nome}
                        </option>
                    {/foreach}
                </select>
            </div>

            <div class="mb-3">
                <label for="quartoId" class="form-label">Número do quarto</label>
                <select class="form-select" id="quartoId" name="quartoId" required>
                    <option value="" disabled selected>Escolha um quarto</option>
                    {foreach $paramsQ->rows as $quarto}
                        <option value="{$quarto->quarto_id}">
                            {$quarto->numero}
                        </option>
                    {/foreach}
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
{/block}