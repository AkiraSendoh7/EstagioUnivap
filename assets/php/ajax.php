<?php
    include_once("/Users/muril/Documents/Estagio/Estagio/assets/php/conexao/banco.php");

    if(isset($_POST['codigocampi']))
    {
        $query = "SELECT * FROM centrocustos WHERE fk_id_codigoCampi=".$_POST['codigocampi'];
        $result = $con->query($query);

        if ($result->num_rows > 0)
        {
            echo '<option value=""> Selecione o centro de custo </option>';
            while($reg = $result->fetch_assoc())
            {
                echo '<option value="'.$reg['codigocentrocusto'].'">'.$reg['codigocentrocusto'].'</option>';
            }
        }

        else
        {
            echo '<option> Nenhum código encontrado! </option>';
        }
    }
