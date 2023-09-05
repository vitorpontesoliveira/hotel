<div class="container mt-5">
    <h2>Lista de Cadastros</h2>

    <table class="table table-striped">
    <thead>
            <tr>
                <th>ID</th>
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
        
        if($qtd >0) {
            while($row = $res->fetch_object()){
                echo "<tr>";
                echo "<td>$row->cliente_id</td>";
                echo "<td>$row->nome</td>";
                echo "<td>$row->telefone</td>";
                echo "<td>$row->email</td>";
                echo "<td><button onclick=\"location.href='?page=editClients&id=".$row->cliente_id."'\" class='btn btn-primary'>Atualizar</button></td>";
                echo "<td><button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->cliente_id."';}else{false}\" class='btn btn-danger'>Deletar</button></td>";
                echo "</tr>";
            }
        }
    ?>
    </tbody>
    
    </table>
</div>
        ?>