<?php
    include_once("conexao/banco.php");

    /* ========== CHECAR A CONEXÃO ========== */
    if ($con->connect_error) {
        die("Conexão falha: " . $con->connect_error);
    }

    //Variáveis para inserção no banco
    $centrodecusto = $descricao = $telefone = $codigo_campi = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["codigocampi"]) === FALSE) {
            $codigo_campi = test_input($_POST["codigo_campi"]);
        }
        if (empty($_POST["centrodecusto"]) === FALSE) {
            $centrodecusto = test_input($_POST["centrodecusto"]);
        }
        if (empty($_POST["descricao"]) === FALSE) {
            $descricao = test_input($_POST["descricao"]);
        }  
        if (empty($_POST["telefone"]) === FALSE){
            $telefone = test_input($_POST["telefone"]);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $sql = "INSERT INTO centrocustos VALUES ('$centrodecusto', '$descricao', '$telefone', '$codigo_campi')";

    if ($con->query($sql) === TRUE) {
        echo "UEBAAAAAAAAAA";
    } else {
        echo "<h1> :((((( </h1>: " . $sql . "<br>" . $con->error;
    }

    $con->close();
