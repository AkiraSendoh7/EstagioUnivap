<?php
    include("conexao/banco.php");
    echo '<table id="table" style="text-align:center" class="table">';
    echo "<tr>";
        echo "<th>Código Área</th>";
        echo "<th>Código Departamento</th>";
        echo "<th>Descrição Área</th>";
        echo "<th>Nome do Responsável</th>";
        echo "<th>Código do Responsável</th>";
        echo "<th>Nome do Supervisor</th>";
        echo "<th>Código do Supervisor</th>";
    echo "<tr>";
    $query = "SELECT * FROM areaOS";
    $result = $con->query($query);
    if($result !== false && $result->num_rows > 0){
        while($reg = $result->fetch_array()){
            echo '<tr>';
            echo '<td>'.$reg["codigo_areaOS"].'</td>';
            echo '<td>'.$reg["codigo_departamento"].'</td>';
            echo '<td>'.$reg["descricao_areaOS"].'</td>';
            echo '<td>'.$reg["nomeresponsavel"].'</td>';
            echo '<td>'.$reg["idresponsavel"].'</td>';
            echo '<td>'.$reg["nomesupervisor"].'</td>';
            echo '<td>'.$reg["idsupervisor"].'</td>';
            echo '<tr>';
        }
    }
    echo "</table>";
?>