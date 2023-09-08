<div class="container mt-5">
    <?php
    if (isset($_REQUEST["cliente_id"])) {
        $cliente_id = $_REQUEST["cliente_id"];
        $sql_cliente = "SELECT nome FROM clientes WHERE cliente_id = $cliente_id";
        $res_cliente = $conn->query($sql_cliente);

        if ($res_cliente && $res_cliente->num_rows > 0) {
            $cliente_nome = $res_cliente->fetch_assoc()["nome"];
        }
    } else {
        $cliente_nome = "";
    }
    ?>

    <div class="border p-4 mx-auto bg-white" style="max-width: 400px;">
        <h2 class="text-center">Nova locação</h2>
        <form action="?page=save" method="post">
            <input type="hidden" name="acao" value="editReservas">
            <input type="hidden" name="id" value="<?= $cliente_id ?>">
            <div class="mb-3">
                <label for="cliente_id" class="form-label">Nome do Cliente</label>
                <select class="form-select" id="cliente_id" name="cliente_id" required>
                    <option value="<?= $cliente_id ?>"><?= $cliente_nome ?></option>
                </select>
            </div>
            <div class="mb-3">
                <label for="quarto_id" class="form-label">Numero do quarto</label>
                <select class="form-select" id="quarto_id" name="quarto_id" required>
                    <option value="" disabled selected>Escolha um quarto</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="data_locacao" class="form-label">Data da Locação</label>
                <input type="date" class="form-control" id="data_locacao" name="data_locacao">
            </div>
            <div class="text-center">
                <br>
                <input type="submit" value="Cadastrar" class="btn btn-primary">
                <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancelar</button>
            </div>
        </form>
    </div>
</div>