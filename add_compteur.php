<?php 
    //https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/requete-preparee/
    if(isset($_POST['code'])){

        $CodeCompteur = $_POST['code'];
        $Type = $_POST['type'];
        $Pu = $_POST['pu'];
        $Client = $_POST['codecli'];
        
        
        


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
            //$stmt = $conn->prepare("INSERT INTO compteur VALUES(:code,:type,:pu,:client)");
            $stmt = $conn->prepare("INSERT INTO compteur VALUES(?,?,?,?)");
           
            $stmt->execute([$CodeCompteur, $Type,$Pu,$Client]);
            //rediriger vers la page Liste des clients
            header('location:compteur.php');
            die();

        } catch(PDOException $e) {
            echo  $e->getMessage();
        }

    }
    
?> 