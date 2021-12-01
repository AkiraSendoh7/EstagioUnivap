<?php
    
    include("conexao/banco.php");

    if(isset($_POST['numero_OS'], $_POST['dept'])){
        
        $query = "SELECT * FROM ordemservico WHERE NumeroOS = ".$_POST['numero_OS']." AND fk_codigoCampi = ".$_POST['dept'];
        
        $result = $con->query($query);
        $reg = $result->fetch_array();

        echo "<div style='align-items: center;font-family: Arial, Helvetica, sans-serif; margin: auto; font-size: medium;'>";
        echo "<p><b>Informações do requisitante</b></p>";
        echo "<p>Nome:",$reg['nomeRequisitante'],"</p>";
        echo "<p>E-mail:",$reg['emailRequisitante'],"</p>";
        echo "<p>Telefone:",$reg['telefoneRequisitante'],"</p>";

        echo "<p><b>Informações da Ordem de Serviço</b></p>";
        echo "-Número da OS";
        echo "<p>",$reg['NumeroOS'],"</p>";

        echo "-Abreviatura do Campi";
        echo "<p>",$reg['abreviatura_campi'],"</p>";

        echo "-Ano";
        echo "<p>",$reg['ano'],"</p>";

        echo "-Código do campi";
        echo "<p>",$reg['fk_codigoCampi'],"</p>";

        echo "-Código do centro de custo";
        echo "<p>",$reg['fk_codigo_centrodecusto'],"</p>";

        echo "-Número da OS";
        echo "<p>",$reg['NumeroOS'],"</p>";

        echo "-Data e hora da requisição--";
        echo "<p>",$reg['dataRequisicao'],", ",$reg['horaRequisicao'],"</p>";

        echo "-Área de serviço";
        echo "<p>",$reg['areaServico'],"</p>";

        echo "-Local de serviço";
        echo "<p>",$reg['localServico'],"</p>";

        echo "-Bloco";
        echo "<p>",$reg['bloco'],"</p>";

        echo "-Descrição do serviço";
        echo "<p>",$reg['descricaoServicos'],"</p>";        
        
    }


?>