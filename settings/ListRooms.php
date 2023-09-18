<div class="container mt-5">
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="5">
                    <h2 class="text-center">Lista de Quartos</h2>
                </th>
            </tr>
            <tr>
                <th>Número</th>
                <th>Ocupado</th>
                <th>Valor</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $sql = "SELECT * FROM quartos";
                $stmt = $pdo->query($sql);

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['numero']}</td>";
                    echo "<td>" . ($row['ocupado'] == 1 ? 'Sim' : 'Não') . "</td>";
                    echo "<td>R$" . number_format($row['valor'], 2, ',', '.') . "</td>";
                    echo "<td><a href='?page=EditRooms&quarto_id={$row['quarto_id']}' class='btn btn-primary'>Editar</a></td>";
                    echo "<td><button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=Save&acao=DeleteRoom&quarto_id={$row['quarto_id']}';}else{false}\" class='btn btn-danger'>Excluir</button></td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
            ?>
        </tbody>
    </table>
</div>
