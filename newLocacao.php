<div class="container mt-5">
        <h1>Cadastro de Locação</h1>
        <form action="?page=save" method="post">
            <input type="hidden" name="acao" value="newReserva">
            <div class="mb-3">
                <label for="cliente_nome" class="form-label">Nome do Cliente</label>
                <input type="text" class="form-control" id="cliente_nome" name="cliente_nome" required>
            </div>
            <div class="mb-3">
                <label for="quarto_numero" class="form-label">Número do Quarto</label>
                <input type="number" class="form-control" id="quarto_numero" name="quarto_numero" required>
            </div>
            <div class="mb-3">
                <label for="data_locacao" class="form-label">Data da Locação</label>
                <input type="date" class="form-control" id="data_locacao" name="data_locacao" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Locação</button>
        </form>
    </div>