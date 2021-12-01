<?php
    include("conexao/banco.php");
    echo '<table id="table" style="text-align:center" class="table">';
    echo "<tr>";
        echo "<th>codigo campi</th>";
        echo "<th>descrição departamento</th>";
        echo "<th>abreviatura</th>";
    echo "<tr>";
    $query = "SELECT * FROM departamentos ORDER BY codigocampi";
    $result = $con->query($query);
    if($result !== false && $result->num_rows > 0){
        while($reg = $result->fetch_array()){
            echo '<tr>';
            echo '<td>'.$reg["codigocampi"].'</td>';
            echo '<td>'.$reg["descricaocampi"].'</td>';
            echo '<td>'.$reg["abreviatura"].'</td>';
            echo '<tr>';
        }
    }
    echo "</table>";
?>