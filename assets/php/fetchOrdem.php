<?php
    include("conexao/banco.php");
    if(isset($_POST['element_abrev'])){
        $query = "SELECT * FROM departamentos WHERE abreviatura = '".$_POST['element_abrev']."'";
        $result = $con->query($query);
        if($result !== false && $result->num_rows > 0){
            $reg = $result->fetch_assoc();
            echo $reg['codigocampi'];
        }
    }elseif(isset($_POST['element_codigo'])){
        $query = "SELECT * FROM departamentos WHERE codigocampi = '".$_POST['element_codigo']."'";
        $result = $con->query($query);
        if($result !== false && $result->num_rows > 0){
            $regs = $result->fetch_assoc();
            echo $regs['abreviatura'];
        }
    }elseif(isset($_POST['abrevs'])){
        if(($_POST['abrevs']) == null ||($_POST['abrevs']) == ""){
            $query = "SELECT * FROM departamentos";
            $result = $con->query($query);
            if($result !== false && $result->num_rows > 0){
                while($regs = $result->fetch_array()){
                    echo '<option value="'.$regs['abreviatura'].'">';
                }
            }
        }else{
            $query = "SELECT * FROM departamentos WHERE codigocampi = '".$_POST['element_codigo']."'";
            $result = $con->query($query);
            if($result !== false && $result->num_rows > 0){
                $regs = $result->fetch_assoc();
                echo $regs['abreviatura'];
            }
        }
    }elseif(isset($_POST['ano_OS'],$_POST['campi_OS'],)){
        $query = "SELECT * FROM ordemservico WHERE ano = '".$_POST['ano_OS']."' AND fk_codigoCampi = '".$_POST['campi_OS']."'";
        $result = $con->query($query);
        if($result !== false){
            $regs = mysqli_num_rows($result);
            echo ($regs + 1);
        }
    }elseif(isset($_POST['codigosCentroDeCusto'])){
        $query = "SELECT * FROM centrocustos WHERE fk_id_codigoCampi = '".$_POST['codigosCentroDeCusto']."'";
        $result = $con->query($query);
        if($result !== false && $result->num_rows > 0){
            while($regs = $result->fetch_array()){
                echo '<option value="' . $regs["codigocentrocusto"] . '">' . $regs["descricao_depto"] . '</option>';
            }
        }
    }elseif(isset($_POST['campi_areaOS'])){
        $query = "SELECT * FROM areaOS WHERE codigo_departamento = '".$_POST['campi_areaOS']."'";
        $result = $con->query($query);
        if($result !== false && $result->num_rows > 0){
            echo '<option value="">Selecione a área de serviço: </option>';
            while($regs = $result->fetch_array()){
                echo '<option value="'.$regs['descricao_areaOS'].'">'.$regs['descricao_areaOS'].'</option>';
            }
        }else{
            echo '<option value="">Selecione a área de serviço: </option>';
        }
    }elseif(isset($_POST['fetchNomebyArea'],$_POST['fetchNomebyDep'])){
        $query = "SELECT * FROM areaOS WHERE codigo_departamento = '".$_POST['fetchNomebyDep']."' AND descricao_areaOS = '".$_POST['fetchNomebyArea']."'";
        $result = $con->query($query);
        while($regs = $result->fetch_array()){
            $div = '<label for="nomeResponsavel">Responsável: </label>
            <input class="nomeResponsavel" type="text" value="'.$regs["nomeresponsavel"].'" name="nomeResponsavel" autocomplete="off" id="nomeResp" placeholder="Nome do Responsável" disabled>
            
            <label for="nomeSupervisor">Supervisor: </label>
            <input class="nomeSupervisor" type="text" value="'.$regs["nomesupervisor"].'" name="nomeSupervisor" autocomplete="off" id="nomeSup" placeholder="Nome do Supervisor" disabled>';
    
        }
       
        echo $div;
    }
?>