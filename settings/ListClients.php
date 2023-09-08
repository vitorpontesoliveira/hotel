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
            
            try {
                $sql = "SELECT * FROM clientes";
                $stmt = $pdo->query($sql);

           
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['cliente_id']}</td>";
                    echo "<td>{$row['nome']}</td>";
                    echo "<td>{$row['telefone']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td><a href='?page=EditClients&cliente_id={$row['cliente_id']}' class='btn btn-primary'>Editar</a></td>";
                    echo "<td><button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=Save&acao=DeleteClient&cliente_id={$row['cliente_id']}';}else{false}\" class='btn btn-danger'>Excluir</button></td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
            
            ?>
        </tbody>

    </table>
</div>