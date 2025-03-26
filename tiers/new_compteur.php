<?php
    $titre = "Nouveau compteur";
?>

<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $titre; ?></title>
        <!--link rel="stylesheet" href="css/exampe.css">-->
    </head>
    <body>
        <form action="add_compteur.php" method="post">
            <div>
                <label>Code:</label>
                <input type="text" name="code">
            </div>
            <div>
            <label>Type:</label>
                <select  name="Type" >
                    <option value="Eau">Eau</option>
                    <option value="Eléctricité">Eléctricité</option>   
                </select>
            </div>
            <div>
                <label>Prix unitaire:</label>
                <input type="number" name="Pu">
            </div>
            <div> 
            <label>Client:</label>
            <select name="client">
                <option value="Client">Choisir Client</option>
            </div>
            <?php
            foreach($clients as $client ){
                echo "<option value=\"$client['CodeCli']"\>$client['Nom']</option>"";
            }
            ?>
            </select>
           
            <input type="submit"  value="Enregistrer">
            <input type="reset"  value="Annuler">
        </form>

    </body>

</html>