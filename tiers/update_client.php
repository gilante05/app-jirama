<?php 
    //https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/requete-preparee/
    if(isset($_POST['code'])){

        $codecli = $_POST['code'];
        $nom = $_POST['nom'];
        

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

            //Mettre à jour un client avec codecli = code
            $stmt = $conn->prepare("UPDATE client SET Nom = :nom  WHERE CodeCli = :code");
            $stmt->bindValue(':code',$codecli);
            $stmt->bindValue(':nom',$nom);
            $stmt->execute();
            //rediriger vers la page Liste des clients
            header('location:clients.php');
            die();

        } catch(PDOException $e) {
            echo  $e->getMessage();
        }

    }
    
?> 