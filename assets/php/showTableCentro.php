<?php
    include("conexao/banco.php");
    echo '<div style="overflow: auto">';
    echo '<table id="table" style="text-align:center" class="table">';
    echo "<tr>";
        echo "<th>Código (centro) </th>";
        echo "<th>Descrição</th>";
        echo "<th>Telefone</th>";
        echo "<th>Departamento</th>";
    echo "<tr>";
    $query = "SELECT centrocustos.*,departamentos.* from centrocustos, departamentos where fk_id_codigoCampi = codigocampi order by codigocampi";
    $result = $con->query($query);
    if($result !== false && $result->num_rows > 0){
        while($reg = $result->fetch_array()){
            echo '<tr>';
            echo '<td>'.$reg["codigocentrocusto"].'</td>';
            echo '<td>'.$reg["descricao_depto"].'</td>';
            echo '<td>'.$reg["telefone"].'</td>';
            echo '<td>'.$reg["descricaocampi"].'</td>';
            echo '<tr>';
        }
    }
    echo "</table>";
    echo "<p>_</p>";
    echo "</div>";
?>