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
    }
?>