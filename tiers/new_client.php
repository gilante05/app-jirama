<?php
    $titre = "Nouveau client";
?>

<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $titre; ?></title>
        <!--link rel="stylesheet" href="css/exampe.css">-->
    </head>
    <body>
        <form action="add_client.php" method="post">
            <div>
                <label>Code</label>
                <input type="text" name="code">
            </div>
            <div>
                <label>Nom</label>
                <input type="text" name="nom">
            </div>
            <div>
                <label>Prenom</label>
                <input type="text" name="prenom">
            </div>
            <div>
                <label>Sexe</label>
                <input type="radio" name="sexe" value="Masculin" checked >Macsulin
                <input type="radio" name="sexe" value="Féminin">Féminin
            </div>
            <div>
                <label>Quartier</label>
                <input type="text" name="quartier">
            </div>
            <div>
                <label>Niveau</label>
                <select  name="niveau" >
                    <option value="VIP">VIP</option>
                    <option value="REGULIER">REGULIER</option>
                    <option value="FIDELE">FIDELE</option>
                    <option value="NOUVEAU">NOUVEAU</option>
                    
                </select>
            </div>
            <div>
                <label>email</label>
                <input type="mail" name="mail">
            </div>
            <input type="submit"  value="Enregistrer">
        </form>

    </body>

</html>