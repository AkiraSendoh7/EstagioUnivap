<?php
    include_once ("banco.php");

    $codi_centr = $_POST['codi'];
    $descri = $_POST['desc'];
    $telefone = $_POST['tel'];

    $con = mysqli_connect($host, $user, $pass, $db);

    $sql = "INSERT INTO departamentos(codigocampi, descricaocampi, abreviatura) 
            VALUES ('$codi_centr','$descri','$telefone')";
            
    $resulta = mysqli_query($con, $sql);
    mysqli_close($con);
?>