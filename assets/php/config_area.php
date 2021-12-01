<?php
    include_once("conexao/banco.php");
    if ($con->connect_error) {
        die("Conexão falha: " . $con->connect_error);
    }
    if(isset($_POST["numeroarea_inserir"], $_POST["departamento_inserir"], $_POST["descricao_inserir"], $_POST["nomeResp_inserir"], $_POST["idResp_inserir"], $_POST["nomeSup_inserir"], $_POST["idSup_inserir"])){
        $verificar_dado = "SELECT * FROM areaOS WHERE codigo_areaOS = '".$_POST['numeroarea_inserir']."' AND codigo_departamento = '".$_POST['departamento_inserir']."'";
        $result = $con->query($verificar_dado);
        if($result !== false && $result->num_rows <= 0){
            $sql = "INSERT INTO areaOS VALUES ('$_POST[numeroarea_inserir]','$_POST[departamento_inserir]','$_POST[descricao_inserir]','$_POST[nomeResp_inserir]','$_POST[idResp_inserir]','$_POST[nomeSup_inserir]','$_POST[idSup_inserir]')";
            if ($con->query($sql) === TRUE) {
                echo '<script> console.log("Dados inseridos com sucesso!"); </script>';
            } else {
                echo '<script> alarm("Ocorreu um erro durante o processo, insira novamente os valores!") </script>';
            }
        }else{
            echo '<script> alarm("Ocorreu um erro durante o processo, valor já existente!") </script>';
        }
        $tab = "$(clickInserir).click()";
    
    }elseif(isset($_POST["numeroarea_alterar"], $_POST["departamento_alterar"], $_POST["nomeResp_alterar"], $_POST["idResp_alterar"], $_POST["nomeSup_alterar"], $_POST["idSup_alterar"])){
        
        $sql = "UPDATE areaOS SET nomeresponsavel = '".$_POST['nomeResp_alterar']."', idresponsavel = '".$_POST['idResp_alterar']."', nomesupervisor = '".$_POST['nomeSup_alterar']."', idsupervisor = '".$_POST['idSup_alterar']."' WHERE codigo_areaOS = '". $_POST['numeroarea_alterar']."' AND codigo_departamento = '". $_POST["departamento_alterar"]."'";
        if ($con->query($sql) === TRUE) {
            echo '<script> console.log("Dados alterados com sucesso!"); </script>';
            
        } else {
           
            echo '<script> console.log("Error") </script>';
        }
        $tab = "$(clickAlterar).click()";
    }elseif(isset($_POST["numeroarea_excluir"],$_POST["departamento_excluir"])){
        $sql = "delete from areaOS where codigo_areaOS = '".$_POST["numeroarea_excluir"]."' AND codigo_departamento = ".$_POST["departamento_excluir"];
        if ($con->query($sql) === TRUE) {
            echo '<script> console.log("Dados excluidos com sucesso!"); </script>';
            
        } else {
            
            echo '<script> alert("Não foi possivel excluir esse campi. Verifique se há algum centro de custo vinculado.") </script>';
        }
        $tab = "$(clickExcluir).click()";
    }
    
    include("area.php");
    echo "<script> 
        window.onload = function() {
            ".$tab."
        };
    </script>";  
    exit();
    $con -> close();
