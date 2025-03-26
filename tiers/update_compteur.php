<?php 
    //https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/requete-preparee/
    if(isset($_POST['code'])){

        $codecompteur = $_POST['code'];
        $type = $_POST['type'];
        

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

            //Mettre à jour un compteur avec codecli = code
            $stmt = $conn->prepare("UPDATE compteur Type = type WHERE CodeCompteur = :code");
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