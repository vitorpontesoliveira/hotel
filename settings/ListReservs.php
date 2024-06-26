<div class="container mt-5">
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="6">
                    <h2 class="text-center">Lista de reservas</h2>
                </th>
            </tr>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>N° Quarto</th>
                <th>Data</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>

            <?php
            try {
                $sql = "SELECT l.locacao_id, c.nome AS cliente_nome, q.numero AS numero_quarto, to_char(l.data, 'DD/MM/YYYY') AS data_formatada
                FROM locacoes AS l
                INNER JOIN clientes AS c ON l.cliente_id = c.cliente_id
                INNER JOIN quartos AS q ON l.quarto_id = q.quarto_id";


                $stmt = $pdo->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>";
                    echo "<td>{$row->locacao_id}</td>";
                    echo "<td>{$row->cliente_nome}</td>";
                    echo "<td>{$row->numero_quarto}</td>";
                    echo "<td>{$row->data_formatada}</td>";
                    echo "<td><button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=Save&acao=DeleteReservs&locacao_id={$row->locacao_id}';}else{false}\" class='btn btn-danger'>Excluir</button></td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
            ?>
        </tbody>
    </table>
</div>