<?php
    if(isset($_GET['code'])){

        $codecli = $_GET['code'];
        $titre = "Edition d'un client";

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
            $stmt = $conn->prepare("SELECT * FROM client WHERE CodeCli = :code");
            $stmt->bindValue(':code', $codecli);
            $stmt->execute();
            // set the resulting array to associative
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            //get and print results
            $client = $stmt->fetch();
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
        <form action="update_client.php" method="post">
            <input type hidden name="code" value="<?php echo $codecli;?>">
            <div>
                <label>Nom</label>
                <input type="text" name="nom" value="<?php echo $client['Nom'];?>">
            </div>
            <input type="submit"  value="Mettre à jour">
        </form>

    </body>

</html>