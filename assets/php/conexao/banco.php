<?php
    $servername = "us-cdbr-east-04.cleardb.com";
    $username = "b8f85f9d421dfb";
    $password = "ac8d19ff";
    $database = 'heroku_9a4d01b9f8d28e2';

    // Create connection
    $con = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($con->connect_error) 
    {
        die("Connection failed: " . $con->connect_error);
    }
