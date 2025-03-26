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
        $stmt = $conn->prepare("SELECT * FROM compteur");
        $stmt->execute();
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        //get and print results
        $compteur = $stmt->fetchAll();
       // var_dump($result);
    } catch(PDOException $e) {
        echo  $e->getMessage();
    }
?> 
<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title>Gestion de compteur</title>
        <link rel="stylesheet" href="css/table.css">
    </head>
    <body>
        <?php
            if($compteur == null)
                echo "Pas de données à afficher";
            else{
        ?>
        <h2>Liste des compteurs</h2>
        <p><a href="new_compteur.php">Nouveau Compteur</a></p>
        <table>
            <tr>
                <th>Code</th>
                <th>Type</th>
                <th>Prix unitaire</th>
                <th>Client</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php
                foreach($compteur as $compteur){
                    echo "<tr>
                    <td>".$compteur['CodeCompteur']."</td>
                    <td>".$compteur['Type']."</td>
                    <td>".$compteur['Pu']."</td>
                    <td>".$compteur['Client']."</td>
                    <td><a href='Edit_compteur.php?code=".$compteur['CodeCompteur']."'>Editer</a></td>
                    <td><a href='del_compteur.php?code=".$compteur['CodeCompteur']."'>Supprimer</a></td>
                    </tr>";
                }
            ?>
        </table>
        <?php } ?>
    </body>

</html>
