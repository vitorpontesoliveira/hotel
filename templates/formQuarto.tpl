{extends file="template.tpl"}
{block name=cadastroQuarto}
    <div class="border p-4 mx-auto bg-white" style="max-width: 400px;">
        <h2 class="text-center">Cadastro de Quartos</h2>
        <form action="/quarto/form/save" method="post">
            <input type="hidden" name="quarto_id">
            <div class="mb-3">
                <label for="numero" class="form-label">Número do quarto:</label>
                <input type="number" value="<?=$model->numero?>" class="form-control" name="numero" id="numero"
                    placeholder="0" min="1" step="1" required>
            </div>
            <div class="form-group">
                <label for="socupado">O quarto está disponível?</label><br>
                <input type="radio" name="ocupado" value='Sim' required>
                Sim<br>
                <input type="radio" name="ocupado" value='Não' required> Não
            </div>
            <div class="col-mb-3">
                <label for="validationCustomUsername" class="form-label">Valor:</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">R$</span>
                    <input type="number" value="<?=$model->valor?>" class="form-control" name="valor" id="valor"
                        placeholder="Valor" step="0.01" required>
                </div>
            </div>
            <div class="text-center mt-3">
                <input type="submit" value="Cadastrar" class="btn btn-primary">
                <button type="button" class="btn btn-secondary" onclick="#">Cancelar</button>
            </div>
        </form>
    </div>
{/block}