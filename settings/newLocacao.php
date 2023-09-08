<div class="container mt-5">
    <div class="border p-4 mx-auto bg-white" style="max-width: 400px;">
        <h2 class="text-center">Nova locação</h2>
        <form action="?page=save" method="post">
            <input type="hidden" name="acao" value="newReserva">
            <div class="mb-3">
                <label for="cliente_id" class="form-label">Nome do Cliente</label>
                <select class="form-select" id="cliente_id" name="cliente_id" required>
                    <option value="" disabled selected>Escolha um cliente</option>
                    <?php
                    $sql = "SELECT cliente_id, nome FROM clientes";
                    $res = mysqli_query($conn, $sql);

                    if ($res) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $cliente_id = $row['cliente_id'];
                            $nome = $row['nome'];
                            echo "<option value='$cliente_id'>$cliente_id - $nome</option>";
                        }
                    } else {
                        echo "Erro ao obter clientes disponíveis: " . mysqli_error($conn);
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="quarto_id" class="form-label">Numero do quarto</label>
                <select class="form-select" id="quarto_id" name="quarto_id" required>
                    <option value="" disabled selected>Escolha um quarto</option>
                    <?php
                    $sql = "SELECT quarto_id, numero FROM quartos";
                    $res = mysqli_query($conn, $sql);

                    if ($res) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $quarto_id = $row['quarto_id'];
                            $numero = $row['numero'];
                            echo "<option value='$quarto_id'>$quarto_id - $numero</option>";
                        }
                    } else {
                        echo "Erro ao obter quartos disponíveis: " . mysqli_error($conn);
                    }
                    ?>
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