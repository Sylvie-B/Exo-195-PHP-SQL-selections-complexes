<?php
$server = 'localhost';
$db = 'exo-194';
$user = 'root';
$pass = '';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>exo 195</title>
</head>
<body>
    <div class="info">
        <h2>Informations utilisateurs :</h2>

    <?php
    /**
     * Utilisez la base de données que vous avez utilisé dans l'exo 194.
     * Utilisez aussi le CSS que vous avez écris ( div contenant l'utilisateur ).
     * Pour chaque sélection, vous utiliserez un div par utilisateur:
     * ex:  <div class="classe-css-utilisateur">
     *          utilisateur 1, données ( nom, prenom, etc ... )
     *      </div>
     *      <div class="classe-css-utilisateur">
     *          utilisateur 2, données ( nom, prenom, etc ... )
     *      </div>
     *
     * -- Sélections complexes --
     * Une seule requête est permise pour chaque point de l'exo.
     */
    try {
    // TODO Commencez par créer votre objet de connexion à la base de données, vous pouvez aussi utiliser l'objet statique ou autre qu'on a créé ensemble.

        $bdd = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /* 1. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' */
    // TODO votre code ici.
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $select = $bdd->prepare("SELECT * from user WHERE nom ='Conor'");
        $ref = $select->execute();

        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div> Utilisateur(s) dont le nom est connor : ".$user['prenom']." ".$user['nom']."</div>";
            }
        }

    /* 2. Sélectionnez et affichez tous les utilisateurs dont le prénom est différent de 'John' */
    // TODO Votre code ici.
        $select = $bdd->prepare("SELECT * from user WHERE prenom !='John'");
        $ref = $select->execute();
        echo "<br><div> Utilisateur(s) dont le prénom n'est pas John : ";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div>".$user['prenom']." ".$user['nom']."</div>";
            }
        }

    /* 3. Sélectionnez et affichez tous les utilisateurs dont l'id est plus petit ou égal à 2 */
    // TODO Votre code ici.
        $select = $bdd->prepare("SELECT * from user WHERE id <= 2");
        $ref = $select->execute();
        echo "<br><div> Utilisateur(s) dont l'id est inférieur ou égal à 2 : ";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div>".$user['prenom']." ".$user['nom']."</div>";
            }
        }

    /* 4. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand ou égal à 2 */
    // TODO Votre code ici.
        $select = $bdd->prepare("SELECT * from user WHERE id >= 2");
        $ref = $select->execute();
        echo "<br><div> Utilisateur(s) dont l'id est supérieur ou égal à 2 : ";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div>".$user['prenom']." ".$user['nom']."</div>";
            }
        }

    /* 5. Sélectionnez et affichez tous les utilisateurs dont l'id est égal à 1 */
    // TODO Votre code ici.
        $select = $bdd->prepare("SELECT * from user WHERE id = 1");
        $ref = $select->execute();
        echo "<br><div> Utilisateur(s) dont l'id est égal à 1 : ";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div>".$user['prenom']." ".$user['nom']."</div>";
            }
        }


    /* 6. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand que 1 ET le nom est égal à 'Doe' */
    // TODO Votre code ici.

    /* 7. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Doe' ET le prénom est 'John'*/
    // TODO Votre code ici.

    /* 8. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' OU le prénom est 'Jane' */
    // TODO Votre code ici.

    /* 9. Sélectionnez et affichez tous les utilisateurs en limitant les réultats à 2 résultats */
    // TODO Votre code ici.

    /* 10. Sélectionnez et affichez tous les utilisateurs par ordre croissant, en limitant le résultat à 1 seul enregistrement */
    // TODO Votre code ici.

    /* 11. Sélectionnez et affichez tous les utilisateurs dont le nom commence par C, fini par r et contient 5 caractères ( voir LIKE )*/
    // TODO Votre code ici.

    /* 12. Sélectionnez et affichez tous les utilisateurs dont le nom contient au moins un 'e' */
    // TODO Votre code ici.

    /* 13. Sélectionnez et affichez tous les utilisateurs dont le prénom est ( IN ) (John, Sarah) ... voir IN , pas OR '' */
    // TODO Votre code ici.

    /* 14. Sélectionnez et affichez tous les utilisateurs dont l'id est situé entre 2 et 4 */
    // TODO Votre code ici.

    }
    catch (PDOException $exception) {
        echo $exception->getMessage();
    }
?>
    </div>
</body>
</html>





