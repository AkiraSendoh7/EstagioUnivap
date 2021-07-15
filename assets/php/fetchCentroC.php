<?php
    include("conexao/banco.php");
    if(isset($_POST['centrocusto'])){
        $query = "SELECT * FROM centrocustos WHERE codigocentrocusto = ".$_POST['centrocusto'];
        $result = $con->query($query);
        if($result !== false && $result->num_rows > 0){
            $reg = $result->fetch_assoc();
            echo $reg['descricao_depto'];
        }
    }elseif(isset($_POST['desc'])){
        $query = "SELECT * FROM centrocustos WHERE descricao_depto = '".$_POST['desc']."'";
        $result = $con->query($query);
        if($result !== false && $result->num_rows > 0){
            $regs = $result->fetch_assoc();
            echo $regs['telefone'];
        }
    }elseif(isset($_POST['verify'])){
        $query = "SELECT codigocentrocusto FROM centrocustos";
        $result = $con->query($query);
        $a= 0;
        $verify = $_POST['verify'];
        if($result !== false && $result->num_rows > 0){
            while($reg = $result->fetch_array()){
              
                if($reg['codigocentrocusto'] == $verify){
                    $a= 1;
                }
            }
        }
        echo $a;
    }elseif(isset($_POST['fetchInCampi'] , $_POST['centro'])){
        $query = "SELECT * FROM centrocustos WHERE fk_id_codigoCampi = ".$_POST['fetchInCampi']." AND codigocentrocusto = ".$_POST['centro'];
        $result = $con->query($query);
        $a= 0;
        if($result !== false && $result->num_rows > 0){
            $a= 1;
        }
        echo $a;
    }
?>
