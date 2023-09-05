<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Lista de Quartos</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Número</th>
                                <th>Ocupado</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM quartos";

                            $res = $conn->query($sql);

                            $qtd = $res->num_rows;

                            if($qtd >0) {
                                while($row = $res->fetch_object()){
                                    echo "<tr>";
                                    echo "<td>$row->quarto_id</td>";
                                    echo "<td>$row->numero</td>";
                                    echo "<td>$row->ocupado</td>";
                                    echo "<td>$row->valor</td>";
                                    echo "<td><button onclick=\"location.href='?page=editRooms&id=".$row->quarto_id."'\" class='btn btn-primary'>Atualizar</button></td>";
                                    echo "<td><button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=save&acao=excluir&id=".$row->quarto_id."';}else{false}\" class='btn btn-danger'>Deletar</button></td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>