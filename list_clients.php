<div class="container mt-5">
<table class="table table-striped">
    <thead>
        <tr>
            <th colspan="6">
                <h2 class="text-center">Lista de Clientes</h2>
            </th>
        </tr>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
        <tbody>

            <?php
            $sql = "SELECT * FROM clientes";

            $res = $conn->query($sql);

            $qtd = $res->num_rows;

            if ($qtd > 0) {
                while ($row = $res->fetch_object()) {
                    echo "<tr>";
                    echo "<td>$row->cliente_id</td>";
                    echo "<td>$row->nome</td>";
                    echo "<td>" . $row->telefone . "</td>";
                    echo "<td>$row->email</td>";
                    echo "<td><button onclick=\"location.href='?page=editClients&cliente_id=" . $row->cliente_id . "'\" class='btn btn-primary'>Editar</button></td>";
                    echo "<td><button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=save&acao=excluirCliente&id=" . $row->cliente_id . "';}else{false}\" class='btn btn-danger'>Excluir</button></td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>

    </table>
</div>