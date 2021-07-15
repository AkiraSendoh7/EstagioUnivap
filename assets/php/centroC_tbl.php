<?php
    include("conexao/banco.php");
    echo '<div style="overflow: auto">';
    echo '<table id="table" style="text-align:center" class="table">';
    echo "<tr>";
        echo "<th>codigo centro de custos</th>";
        echo "<th>descrição centro de custos</th>";
        echo "<th>telefone</th>";
        echo "<th>id campi</th>";
    echo "<tr>";
    $query = "SELECT * FROM centrocustos ORDER BY fk_id_codigoCampi";
    $result = $con->query($query);
    if($result !== false && $result->num_rows > 0){
        while($reg = $result->fetch_array()){
            echo '<tr>';
            echo '<td>'.$reg["codigocentrocusto"].'</td>';
            echo '<td>'.$reg["descricao_depto"].'</td>';
            echo '<td>'.$reg["telefone"].'</td>';
            echo '<td>'.$reg["fk_id_codigoCampi"].'</td>';
            echo '<tr>';
        }
    }
    echo "</table>";
    echo "</div>";
?>