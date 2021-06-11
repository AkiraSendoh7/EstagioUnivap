<?php
    include_once ("banco.php");

    // Check connection
    if ($con->connect_error) 
    {
        die ("Conexão falha: " . $con->connect_error);
    }

    $codigo_campi = $_POST['codigo_campi'];
    $descricao = $_POST['desc'];
    $abreviatura = $_POST['abrev'];

    $sql = "INSERT INTO departamentos VALUES ('$codigo_campi','$descricao','$abreviatura')";

    if ($con -> query($sql) === TRUE) 
    {
        echo "UEBAAAAAAAAAA";
    } 
    
    else 
    {
        echo "<h1> :((((( </h1>: " . $sql . "<br>" . $con->error;
    }

    $con -> close();

?>
