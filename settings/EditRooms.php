<div class="container mt-5">
    <?php
    $sql = "SELECT * FROM quartos WHERE quarto_id = :quarto_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':quarto_id', $_REQUEST["quarto_id"]);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_OBJ);
    ?>
    <div class="container mt-5">
        <div class="border p-4 mx-auto bg-white" style="max-width: 400px;">
            <h2 class="text-center">Edição de Quartos</h2>
            <form action="?page=Save" method="post">
                <input type="hidden" name="acao" value="EditRooms">
                <input type="hidden" name="id" value="<?= $row->quarto_id ?>">
                <div class="mb-3">
                    <label for="nomeQuarto" class="form-label">Numero do quarto:</label>
                    <input type="number" class="form-control" name="number" id="number" placeholder="Número do quarto" step="1" value="<?= $row->numero ?>" required>
                </div>
                <div class="form-group">
                    <label for="condicaoQuarto">O quarto está disponível?</label><br>
                    <input type="radio" name="ocupado" <?= $row->ocupado === 1 ? 'checked' : '' ?> value="1" required>SIM<br>
                    <input type="radio" name="ocupado" <?= $row->ocupado === 0 ? 'checked' : '' ?> value="0" required>NÃO
                </div>
                <div class="col-mb-3">
                    <label for="validationCustomUsername" class="form-label">Valor:</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">R$</span>
                        <input type="number" class="form-control" name="val" id="val" placeholder="Valor" step="0.01" value="<?= number_format($row->valor, 2)?>" required>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <input type="submit" value="Salvar" class="btn btn-primary">
                    <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancelar</button>
                </div>
            </form>
        </div>
    </div>