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
        $clients = $stmt->fetchAll();
       // var_dump($result);
    } catch(PDOException $e) {
        echo  $e->getMessage();
    }
?> 
<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title>Gestion clients</title>
        <link rel="stylesheet" href="css/table.css">
    </head>
    <body>
        <?php
            if($clients == null)
                echo "Pas de données à afficher";
            else{
        ?>
        <h2>Liste des clients</h2>
        <p><a href="new_client.php">Nouveau Client</a></p>
        <table>
            <tr><th>Code</th><th>Nom</th><th>Prénoms</th><th>E-mail</th><th colspan="2">Actions</th></tr>
            <?php
                foreach($clients as $client){
                    echo "<tr>
                    <td>".$client['CodeCli']."</td>
                    <td>".$client['Nom']."</td>
                    <td>".$client['Prenom']."</td>
                    <td>".$client['Mail']."</td>
                    <td><a href='edit_client.php?code=".$client['CodeCli']."'>Editer</a></td>
                    <td><a href='del_client.php?code=".$client['CodeCli']."'>Supprimer</a></td>
                    </tr>";
                }
            ?>
        </table>
        <?php } ?>
    </body>

</html>
