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
            $sql = "SELECT * FROM quartos";

            $res = $conn->query($sql);

            $qtd = $res->num_rows;

            if ($qtd > 0) {
                while ($row = $res->fetch_object()) {
                    echo "<tr>";
                    echo "<td>$row->numero</td>";
                    echo "<td>$row->ocupado</td>";
                    echo "<td>R$" . number_format($row->valor, 2, ',', '.') . "</td>";
                    echo "<td><button onclick=\"location.href='?page=editRooms&quarto_id=" . $row->quarto_id . "'\" class='btn btn-primary'>Editar</button></td>";
                    echo "<td><button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=save&acao=excluirQuarto&quarto_id=" . $row->quarto_id . "';}else{false}\" class='btn btn-danger'>Excluir</button></td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>