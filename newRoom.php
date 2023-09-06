<div class="container mt-5">
    <div class="border p-4 mx-auto" style="max-width: 400px;">
        <h2 class="text-center">Cadastros de Quartos</h2>
        <form action="?page=save" method="post">
            <input type="hidden" name="acao" value="cadastrarRoom">
            <div class="mb-3">
                <label for="nomeQuarto" class="form-label">Numero do quarto:</label>
                <input type="number" class="form-control" name="number" id="number" placeholder="0" min="1" step="1" required>
            </div>
            <div class="form-group">
                <label for="condicaoQuarto">O quarto está disponível?</label><br>
                <input type="radio" name="ocupado" value="Sim" required> Sim<br>
                <input type="radio" name="ocupado" value="Não" required> Não
            </div>
            <div class="col-mb-3">
                <label for="validationCustomUsername" class="form-label">Valor:</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">R$</span>
                    <input type="number" class="form-control" name="val" id="val" placeholder="Valor" step="0.01" required>
                </div>
            </div>
            <div class="text-center mt-3">
                <input type="submit" value="Cadastrar" class="btn btn-primary">
                <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancelar</button>
            </div>
        </form>
    </div>
</div>