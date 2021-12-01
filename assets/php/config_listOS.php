<?php

    include("conexao/banco.php");
    $cont = 0;

    function prioridadeOS($prioridade, $valOS){

        $valprioridade = 0;

        if($prioridade == "Sem Prioridade"){
            $valprioridade = 0;
        }else if($prioridade == "Normal"){
            $valprioridade = 1;
        }else if($prioridade == "Urgente"){
            $valprioridade = 2;
        }else if($prioridade == "Emergencial"){
            $valprioridade = 3;
        }else if($prioridade == "Preventiva"){
            $valprioridade = 4;
        }
        return '#OSPrioridade'.$valOS.' option[value='.$valprioridade.']';
    }

    function prioridadeOS_txt($val){
        if($val == 0){
            $txtprioridade = "Sem Prioridade";
        }else if($val == 1){
            $txtprioridade = "Normal";
        }else if($val == 2){
            $txtprioridade = "Urgente";
        }else if($val == 3){
            $txtprioridade = "Emergencial";
        }else if($val == 4){
            $txtprioridade = "Preventiva";
        }
        return $txtprioridade;
    }

    function def_condicao($cond){
        if($cond == "Fechado"){
            $val = 1;
        }else{
            $val = 0;
        }
        return $val;
    }



    if(isset($_POST['condicao_AF'], $_POST['Departamento'])){
        
        $cont = 0;
        echo '<div style="overflow: auto">';
        echo '<table class="tabelaOS tabelaItens" style="align-items: center;" id="OS" frame=void rules=rows>';
        echo "<tr>";
            echo "<th>Número OS</th>";
            echo "<th>Data</th>";
            echo "<th>Departamento</th>";
            echo "<th>Prioridade</th>";
            echo "<th>Estado (Aberto/Fechado)</th>";
        echo "<tr>";

        if($_POST['condicao_AF'] != null && $_POST['condicao_AF'] != 0){
            if($_POST['Departamento'] != null && $_POST['Departamento'] != 0){
                if($_POST['condicao_AF'] == 1){
                    $query = "SELECT * from ordemservico where condicao_abertaFechada = 'Aberta' AND fk_codigoCampi = ".$_POST['Departamento']." order by dataRequisicao"; 
                }else{
                    $query = "SELECT * from ordemservico where condicao_abertaFechada = 'Fechado' AND fk_codigoCampi = ".$_POST['Departamento']." order by dataRequisicao"; 
                }
               
            }else{
                if($_POST['condicao_AF'] == 1){
                    $query = "SELECT * from ordemservico where condicao_abertaFechada = 'Aberta' order by dataRequisicao"; 
                }else{
                    $query = "SELECT * from ordemservico where condicao_abertaFechada = 'Fechado' order by dataRequisicao"; 
                }
            }
            
        }else{     
            if($_POST['Departamento'] != null && $_POST['Departamento'] != 0){
                $query = "SELECT * from ordemservico WHERE fk_codigoCampi = ".$_POST['Departamento']." order by dataRequisicao";
            }else{
                $query = "SELECT * from ordemservico order by condicao_abertaFechada desc, dataRequisicao";
            }
        }

        $result = $con->query($query);
        if($result !== false && $result->num_rows > 0){
            while($reg = $result->fetch_array()){
                echo '<tr>';
                echo '<td name="OSn">'.$reg["NumeroOS"].'<button name="targetButton" onclick="buttonclick(this.value)" value="'.$cont.'" type="button" e-ripple="true" style="margin-left: 5px; margin-bottom: 2px; font-size: 12px; padding: 1px 7px;">Visualizar</button> </td>';
                echo '<td name="dataOS">'.$reg["dataRequisicao"].'</td>';
                echo '<td name="departamento">'.$reg["fk_codigoCampi"].'</td>';
                echo '<td>
                    <select id="OSPrioridade'.$cont.'" onchange="setPrioridade(this.id, this.name)" name="'.$cont.'"> 
                        <option value="0">Sem Prioridade</option>
                        <option value="1">Normal</option>
                        <option value="2">Urgente</option>
                        <option value="3">Emergencial</option>
                        <option value="4">Preventiva</option>
                    </select>
                </td>';
                if($reg["condicao_abertaFechada"] == "Aberta"){
                    echo '<td>'.$reg["condicao_abertaFechada"].'<button value="'.def_condicao($reg["condicao_abertaFechada"]).'" name="'.$cont.'" onclick="fechar_AbrirOS(this.name, this.value)" style="margin-left: 5px; margin-bottom: 2px; font-size: 12px; padding: 1px 7px;">Fechar</button></td>';
                }else{
                    echo '<td>'.$reg["condicao_abertaFechada"].'<button value="'.def_condicao($reg["condicao_abertaFechada"]).'" name="'.$cont.'" onclick="fechar_AbrirOS(this.name, this.value)" style="margin-left: 5px; margin-bottom: 2px; font-size: 12px; padding: 1px 7px;">Abrir</button></td>';
                }
                
                echo '<tr>';
                $cont++;
            }
        }
        echo "</table>";
        echo "</div>";
    }elseif(isset($_POST['numOS'],$_POST['dataOS'],$_POST['Departamento'],$_POST['num'])){
        $query = "SELECT * FROM ordemservico where NumeroOS = '".$_POST['numOS']."' AND dataRequisicao = '".$_POST['dataOS']."' AND fk_codigoCampi = '".$_POST['Departamento']."'";
        $result = $con->query($query);
        if($result !== false && $result->num_rows > 0){
            $reg = $result->fetch_array();
            echo prioridadeOS($reg['prioridade'], $_POST['num']);
        }
    }elseif(isset($_POST['set_numOS'],$_POST['set_dataOS'],$_POST['set_Departamento'],$_POST['val'])){
        $query = "UPDATE ordemservico SET prioridade = '".prioridadeOS_txt($_POST['val'])."' WHERE NumeroOS = '".$_POST['set_numOS']."' AND fk_codigoCampi = '".$_POST['set_Departamento']."' AND dataRequisicao = '".$_POST['set_dataOS']."'";
        if ($con->query($query) === TRUE) {
            echo "Prioridade alterada com sucesso";
        }else{
            echo "Não foi possivel alterar a prioridade desta OS";
        }
    }elseif(isset($_POST['abrirFechar_numOS'],$_POST['abrirFechar_dataOS'],$_POST['abrirFechar_Departamento'],$_POST['abrirFechar'])){
        $query = "UPDATE ordemservico SET condicao_abertaFechada = '".$_POST['abrirFechar']."' WHERE NumeroOS = '".$_POST['abrirFechar_numOS']."' AND fk_codigoCampi = '".$_POST['abrirFechar_Departamento']."' AND dataRequisicao = '".$_POST['abrirFechar_dataOS']."'";
        if ($con->query($query) === TRUE) {
            echo "Estado da ordem alterado com sucesso";
        }else{
            echo "Não foi possivel alterar o estado desta OS";
        }
    }
        

?>