<?php 
    //https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/requete-preparee/
    if(isset($_GET['code'])){

        $codecompteur = $_GET['code'];
        //connexion à la BD
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

            //supprimer un client avec codecli = code
            $stmt = $conn->prepare("DELETE FROM compteur WHERE CodeCompteur = :code");
            $stmt->bindValue(':code',$codecompteur);
            $stmt->execute();
            //rediriger vers la page Liste des clients
            header('location:compteur.php');
            die();

        } catch(PDOException $e) {
            echo  $e->getMessage();
        }

    }
    
?> 