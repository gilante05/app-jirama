<?php
    $servername = "localhost";
    $database = "gestion_jirama";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;
                dbname=$database",$username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        $stmt = $conn->prepare("SELECT * FROM client");
        $stmt->execute();
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        //get and print results
        $result = $stmt->fetchAll();
        var_dump($result);
    } catch(PDOException $e) {
        echo  $e->getMessage();
    }
?> 