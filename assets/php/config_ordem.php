<?php
    include_once("conexao/banco.php");
    if ($con->connect_error) {
        die("Conexão falha: " . $con->connect_error);
    }
    if(isset($_POST['numeroOS_inserir'],$_POST['abreviatura_inserir'],$_POST['ano'],$_POST['codigocampi_inserir'],$_POST['centrocustos_inserir'],$_POST['data'],$_POST['time_inserir'],$_POST['nomerequisitante'],$_POST['tel_inserir'],$_POST['email'],$_POST['codigoarea_inserir'],$_POST['localServico'],$_POST['bloco'],$_POST['desc_inserir'])){
        $sql = "INSERT INTO ordemservico VALUES ('".$_POST['numeroOS_inserir']."', '".$_POST['abreviatura_inserir']."', '".$_POST['ano']."', '".$_POST['codigocampi_inserir']."', '".$_POST['centrocustos_inserir']."', '".$_POST['data']."', '".$_POST['time_inserir']."', '".$_POST['nomerequisitante']."', '".$_POST['tel_inserir']."', '".$_POST['email']."', '".$_POST['codigoarea_inserir']."', '".$_POST['localServico']."', '".$_POST['bloco']."', '".$_POST['desc_inserir']."','Sem Prioridade','Aberta')";
        if ($con->query($sql) === TRUE) {
            echo '<script> console.log("Ordem enviada com sucesso!"); </script>';
            $tab = "$(clickInserir).click()";
           
        } else {
            echo '<script> alarm("Ocorreu um erro durante o processo, tente novamente!") </script>';
        }
        $tab = "$(clickInserir).click()";
    }else{
        echo '<script type="text/javascript"> alert("'.$_POST['numeroOS_inserir'].'");</script>';
    }

  
    include("ordemservico.php");
    
    echo '<script src="../js/vanilla-masker.js"></script>';
    echo "<script> 
        window.onload = function() {
            ".$tab."
        };
    </script>";  
    exit();
    $con->close();
?>