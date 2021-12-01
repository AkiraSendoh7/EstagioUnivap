<?php
    include_once("conexao/banco.php");
    $tab ="";
    /* ========== CHECAR A CONEXÃO ========== */
    if ($con->connect_error) {
        die("Conexão falha: " . $con->connect_error);
    }
    
    if(isset($_POST["n_centro"],$_POST["descricao"],$_POST["telefone"],$_POST["var_dep"])){
        if($_POST["var_dep"] != ""){   
            $sql = "INSERT INTO centrocustos VALUES ('".$_POST['n_centro']."', '".$_POST['descricao']."', '".$_POST['telefone']."', '".$_POST['var_dep']."')";
            if ($con->query($sql) === TRUE) {
                echo '<script> console.log("Dados inseridos com sucesso!"); </script>';
                $tab = "$(clickInserir).click()";
            
            }
        }
    }elseif(isset($_POST["n_centro_alt"],$_POST["descricao_alt"],$_POST["telefone_alt"])){
        $sql = "UPDATE centrocustos SET descricao_depto = '".$_POST['descricao_alt']."', telefone = '".$_POST['telefone_alt']."' WHERE codigocentrocusto = '".$_POST['n_centro_alt']."'";
        if ($con->query($sql) === TRUE) {
            echo '<script> console.log("Dados alterados com sucesso!"); </script>';
            $tab = "$(clickAlterar).click()";
        
        }
    }elseif(isset($_POST['exc_centro'])){
        $sql = "DELETE from centrocustos where codigocentrocusto = '".$_POST['exc_centro']."'";
        if ($con->query($sql) === TRUE) {
            echo '<script> console.log("Dados excluidos com sucesso!"); </script>';
            $tab = "$(clickAlterar).click()";
        
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