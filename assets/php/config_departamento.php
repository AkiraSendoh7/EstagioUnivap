<?php
    include_once("conexao/banco.php");
    if ($con->connect_error) {
        die("Conexão falha: " . $con->connect_error);
    }
    if(isset($_POST["codigocampi_inserir"], $_POST["descricao_inserir"], $_POST["abrev_inserir"])){

        $sql = "INSERT INTO departamentos VALUES ('$_POST[codigocampi_inserir]','$_POST[descricao_inserir]','$_POST[abrev_inserir]')";
        if ($con->query($sql) === TRUE) {
            echo '<script> console.log("Dados inseridos com sucesso!"); </script>';
            $tab = "$(clickInserir).click()";
        } else {
            echo '<script> alarm("Ocorreu um erro durante o processo, insira novamente os valores!") </script>';
        }
    
    }elseif(isset($_POST["codigocampi_alterar"], $_POST["descricao_alterar"], $_POST["abrev_alterar"])){
        
        $sql = "UPDATE departamentos SET descricaocampi = '".$_POST['descricao_alterar']."' , abreviatura = '".$_POST['abrev_alterar']."' WHERE codigocampi = '". $_POST['codigocampi_alterar']."'";
        if ($con->query($sql) === TRUE) {
            echo '<script> console.log("Dados alterados com sucesso!"); </script>';
            $tab = "$(clickAlterar).click()";
            
        } else {
           
            echo '<script> console.log("Error") </script>';
        }
    
    }elseif(isset($_POST["codigocampi_excluir"])){
        $sql = "delete from departamentos where codigocampi = ".$_POST["codigocampi_excluir"];
        if ($con->query($sql) === TRUE) {
            echo '<script> console.log("Dados excluidos com sucesso!"); </script>';
            $tab = "$(clickExcluir).click()";
        } else {
            $tab = "$(clickExcluir).click()";
            echo '<script> alert("Não foi possivel excluir esse campi. Verifique se há algum centro de custo vinculado.") </script>';
        }
    }
    
    include("departamento.php");
    echo "<script> 
        window.onload = function() {
            ".$tab."
        };
    </script>";  
    exit();
    $con -> close();
?>