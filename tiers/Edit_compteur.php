<?php
    if(isset($_GET['code'])){

        $codecompteur = $_GET['code'];
        $titre = "Edition d'un compteur";

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
            $stmt = $conn->prepare("SELECT * FROM compteur WHERE CodeCompteur = :code");
            $stmt->bindValue(':code', $codecompteur);
            $stmt->execute();
            // set the resulting array to associative
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            //get and print results
            $compteur = $stmt->fetch();
        }
        catch(PDOException $e) {
            echo  $e->getMessage();
        }
    }
?>


<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $titre; ?></title>
        <!--link rel="stylesheet" href="css/exampe.css">-->
    </head>
    <body>
        <form action="update_compteur.php" method="post">
            <label>Type:</label>
                <select  name="Type" >
                    <option value="Eau">Eau</option>
                    <option value="Eléctricité">Eléctricité</option>   
                </select>
            <br>
            <input type="submit" value=" Update">
            <input type="reset" value=" Reset">
        </form>

    </body>

</html>