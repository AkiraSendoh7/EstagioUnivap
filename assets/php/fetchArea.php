<?php
    include("conexao/banco.php");
    if(isset($_POST['verify'])){
        $query = "SELECT codigo_areaOS FROM areaOS";
        $result = $con->query($query);
        $a= 0;
        $verify = $_POST['verify'];
        if($result !== false && $result->num_rows > 0){
            while($reg = $result->fetch_array()){
              
                if($reg['codigo_areaOS'] == $verify){
                    $a= 1;
                }
            }
        }
        echo $a;
    }elseif(isset($_POST['verifyy'], $_POST['depto'])){
        $query = "SELECT * FROM areaOS WHERE codigo_areaOS = '".$_POST['verifyy']."' AND codigo_departamento = ".$_POST['depto'];
        $result = $con->query($query);
        if($result !== false && $result->num_rows > 0){
            $reg = $result->fetch_assoc();
            echo $reg['descricao_areaOS'];
        }
    }elseif(isset($_POST['search_nomeResp'], $_POST['depto'])){
        $query = "SELECT * FROM areaOS WHERE codigo_areaOS = '".$_POST['search_nomeResp']."' AND codigo_departamento = ".$_POST['depto'];
        $result = $con->query($query);
        if($result !== false && $result->num_rows > 0){
            $reg = $result->fetch_assoc();
            echo $reg['nomeresponsavel'];
        }
    }elseif(isset($_POST['search_idResp'], $_POST['depto'])){
        $query = "SELECT * FROM areaOS WHERE codigo_areaOS = '".$_POST['search_idResp']."' AND codigo_departamento = ".$_POST['depto'];
        $result = $con->query($query);
        if($result !== false && $result->num_rows > 0){
            $reg = $result->fetch_assoc();
            echo $reg['idresponsavel'];
        }
    }elseif(isset($_POST['search_nomeSup'], $_POST['depto'])){
        $query = "SELECT * FROM areaOS WHERE codigo_areaOS = '".$_POST['search_nomeSup']."' AND codigo_departamento = ".$_POST['depto'];
        $result = $con->query($query);
        if($result !== false && $result->num_rows > 0){
            $reg = $result->fetch_assoc();
            echo $reg['nomesupervisor'];
        }
    }elseif(isset($_POST['search_idSup'], $_POST['depto'])){
        $query = "SELECT * FROM areaOS WHERE codigo_areaOS = '".$_POST['search_idSup']."' AND codigo_departamento = ".$_POST['depto'];
        $result = $con->query($query);
        if($result !== false && $result->num_rows > 0){
            $reg = $result->fetch_assoc();
            echo $reg['idsupervisor'];
        }
    }elseif(isset($_POST['area'])){
        $query = "SELECT distinct codigo_departamento FROM areaos WHERE codigo_areaOS = '".$_POST['area']."'";
        $result = $con->query($query);
        if($result !== false && $result->num_rows > 0){
            
            while($reg = $result->fetch_array()){
              echo '<option value="'.$reg["codigo_departamento"].'">';   
            }
            
        }
    }elseif(isset($_POST['verify_dept'],$_POST['ar'])){
        $query = "SELECT codigo_departamento FROM areaOS WHERE codigo_areaOS ='".$_POST['ar']."'";
        $result = $con->query($query);
        $a= 0;
        $verify = $_POST['verify_dept'];
        if($result !== false && $result->num_rows > 0){
            while($reg = $result->fetch_array()){
              
                if($reg['codigo_departamento'] == $verify){
                    $a= 1;
                }
            }
        }
        echo $a;
    }
?>