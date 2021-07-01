<?php
    include_once("/Users/muril/Documents/Estagio/Estagio/assets/php/conexao/banco.php");
 
    //Variáveis para inserção no banco
    $codigocampi = $descricao = $abreviatura = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["codigocampi"]) === FALSE) {
            $codigocampi = test_input($_POST["codigocampi"]);
        }  
        if (empty($_POST["descricao"]) === FALSE) {
            $descricao = test_input($_POST["descricao"]);
        }  
        if (empty($_POST["abrev"]) === FALSE) {
            $abreviatura = test_input($_POST["abrev"]);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $sql = "INSERT INTO departamentos VALUES ('$codigocampi','$descricao','$abreviatura')";

    if ($con->query($sql) === TRUE) {
        echo "UEBAAAAAAAAAA";
    } else {
        echo "<h1> :((((( </h1>: " . $sql . "<br>" . $con->error;
    }

    $con -> close();
