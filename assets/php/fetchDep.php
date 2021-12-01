<?php
    include("conexao/banco.php");
    if(isset($_POST['id'])){
        $query = "SELECT * FROM departamentos WHERE codigocampi = ".$_POST['id'];
        $result = $con->query($query);
        if($result !== false && $result->num_rows > 0){
            $reg = $result->fetch_assoc();
            echo $reg['descricaocampi'];
        }
    }elseif(isset($_POST['desc'])){
        $query = "SELECT * FROM departamentos WHERE descricaocampi = '".$_POST['desc']."'";
        $result = $con->query($query);
        if($result !== false && $result->num_rows > 0){
            $regs = $result->fetch_assoc();
            echo $regs['abreviatura'];
        }
    }elseif(isset($_POST['verify'])){
        $query = "SELECT codigocampi FROM departamentos";
        $result = $con->query($query);
        $a= 0;
        $verify = $_POST['verify'];
        if($result !== false && $result->num_rows > 0){
            while($reg = $result->fetch_array()){
              
                if($reg['codigocampi'] == $verify){
                    $a= 1;
                }
            }
        }
        echo $a;
    }elseif(isset($_POST['verify_centro'])){
        $query = "SELECT centrocustos.*,departamentos.* from centrocustos, departamentos where fk_id_codigoCampi = ".$_POST['verify_centro']." AND codigocampi = ".$_POST['verify_centro'];
        $result = $con->query($query);
        $a= 0;
        if($result !== false && $result->num_rows > 0){
            $a= 1;
        }
        echo $a;
    }
?>