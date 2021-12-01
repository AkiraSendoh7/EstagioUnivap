<?php
    include_once("conexao/banco.php");
    $tab ="";
    /* ========== CHECAR A CONEXÃO ========== */
    if ($con->connect_error) {
        die("Conexão falha: " . $con->connect_error);
    }
    
    if(isset($_POST["centro"])){
        $sql = "SELECT distinct descricaocampi,codigocampi from departamentos,centrocustos where codigocentrocusto = '".$_POST["centro"]."' AND codigocampi in(SELECT fk_id_codigoCampi from centrocustos where codigocentrocusto = '".$_POST["centro"]."') <> fk_id_codigoCampi in(select fk_id_codigoCampi from centrocustos where codigocentrocusto = '".$_POST["centro"]."')";
        $result = $con->query($sql);
        echo '<option value="">Selecione o código do campi: </option>';
        if($result -> num_rows > 0){
            while ($reg = $result->fetch_array()) {
                echo '<option value="' . $reg["codigocampi"] . '">' . $reg["codigocampi"] . ' - ' . $reg["descricaocampi"] . '</option>';
            }
        }else{
            $sql = "SELECT * FROM departamentos";
            $result = $con->query($sql);
            while ($reg = $result->fetch_array()) {
                echo '<option value="' . $reg["codigocampi"] . '">' . $reg["codigocampi"] . ' - ' . $reg["descricaocampi"] . '</option>';
            }
        }
        
    }elseif(isset($_POST["centrocustos_inserir"],$_POST["desc_inserir"],$_POST["tel_inserir"],$_POST["codigocampi_inserir"],$_POST["cont"] )){
        echo "<tr>";
        echo "<td><span>".$_POST["centrocustos_inserir"]."</span></td>";
        echo "<td><span>".$_POST["desc_inserir"]."</span></td>";
        echo "<td><span>".$_POST["tel_inserir"]."</span></td>";
        echo "<td><label name='inserir".$_POST["cont"]."'>".$_POST["codigocampi_inserir"]."</label></td>";
        echo "<tr>";
    }elseif(isset($_POST['buscarCentros'])){
        $sql = "SELECT distinct codigocentrocusto, descricao_depto from centrocustos";
        $result = $con->query($sql);

        while($reg = $result->fetch_array()){
            echo '<option value = '.$reg["codigocentrocusto"].'> '.$reg["codigocentrocusto"].' - '.$reg["descricao_depto"].' </option>';
        }
    }elseif(isset($_POST['buscarDescricao'])){
        $sql = "SELECT * from centrocustos WHERE codigocentrocusto = '".$_POST['buscarDescricao']."'";
        $result = $con->query($sql);
        if($result !== false && $result->num_rows > 0){
            $reg = $result->fetch_array();
            echo $reg["descricao_depto"];
        }
        
    }elseif(isset($_POST['buscarTel'])){
        $sql = "SELECT * from centrocustos WHERE codigocentrocusto = '".$_POST['buscarTel']."'";
        $result = $con->query($sql);
        if($result !== false && $result->num_rows > 0){
            $reg = $result->fetch_array();
            echo $reg["telefone"];
        }
        
    }elseif(isset($_POST['ver_os'])){
        $sql = "SELECT * from ordemservico WHERE fk_codigo_centrodecusto = '".$_POST['ver_os']."'";
        $result = $con->query($sql);
        if($result !== false && $result->num_rows > 0){
            echo 1;
        }else{
            echo 0;
        }
    }

    $con->close();
    exit();

    include("centrodecustos.php");
    
    echo '<script src="/Estagio/assets/js/vanilla-masker.js"></script>';
    echo '<script> 
        window.onload = function() {
            '.$tab.'
        };
    </script>';  
?>