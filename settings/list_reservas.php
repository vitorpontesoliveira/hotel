<div class="container mt-5">
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="6">
                    <h2 class="text-center">Lista de reservas</h2>
                </th>
            </tr>
            <tr>
                <th>#Locacao</th>
                <th>#Cliente</th>
                <th>Quarto</th>
                <th>Data</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT * FROM locacoes";

            $res = $conn->query($sql);

            $qtd = $res->num_rows;

            if ($qtd > 0) {
                while ($row = $res->fetch_object()) {
                    echo "<tr>";
                    echo "<td>$row->locacao_id</td>";
                    echo "<td>$row->cliente_id</td>";
                    echo "<td>$row->quarto_id</td>";
                    echo "<td>$row->data</td>";
                    echo "<td><button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=save&acao=excluirReserva&cliente_id=" . $row->cliente_id . "';}else{false}\" class='btn btn-danger'>Excluir</button></td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>
