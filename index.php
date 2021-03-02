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

        echo "<div class='info'> Utilisateur(s) dont le nom est connor : <br>";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo $user['prenom']." ".$user['nom'];
            }
        }
        echo "</div>";
    /* 2. Sélectionnez et affichez tous les utilisateurs dont le prénom est différent de 'John' */
    // TODO Votre code ici.
        $select = $bdd->prepare("SELECT * from user WHERE prenom !='John'");
        $ref = $select->execute();
        echo "<br><div class='info'> Utilisateur(s) dont le prénom n'est pas John : ";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div>".$user['prenom']." ".$user['nom']."</div>";
            }
        }
        echo "</div>";
    /* 3. Sélectionnez et affichez tous les utilisateurs dont l'id est plus petit ou égal à 2 */
    // TODO Votre code ici.
        $select = $bdd->prepare("SELECT * from user WHERE id <= 2");
        $ref = $select->execute();
        echo "<br><div class='info'> Utilisateur(s) dont l'id est inférieur ou égal à 2 : ";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div>".$user['id']." ".$user['prenom']." ".$user['nom']."</div>";
            }
        }
        echo "</div>";

    /* 4. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand ou égal à 2 */
    // TODO Votre code ici.
        $select = $bdd->prepare("SELECT * from user WHERE id >= 2");
        $ref = $select->execute();
        echo "<br><div class='info'> Utilisateur(s) dont l'id est supérieur ou égal à 2 : ";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div>".$user['id']." ".$user['prenom']." ".$user['nom']."</div>";
            }
        }
        echo "</div>";
    /* 5. Sélectionnez et affichez tous les utilisateurs dont l'id est égal à 1 */
    // TODO Votre code ici.
        $select = $bdd->prepare("SELECT * from user WHERE id = 1");
        $ref = $select->execute();
        echo "<br><div class='info'> Utilisateur(s) dont l'id est égal à 1 : ";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div>".$user['id']." ".$user['prenom']." ".$user['nom']."</div>";
            }
        }
        echo "</div>";

    /* 6. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand que 1 ET le nom est égal à 'Doe' */
    // TODO Votre code ici.

        $select = $bdd->prepare("SELECT * from user WHERE id > 1 AND nom = 'Doe'");
        $ref = $select->execute();
        echo "<br><div class='info'> Utilisateur(s) dont l'id est sup à 1 et dont le nom est Doe: ";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div>".$user['id']." ".$user['prenom']." ".$user['nom']."</div>";
            }
        }
        echo "</div>";
    /* 7. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Doe' ET le prénom est 'John'*/
    // TODO Votre code ici.

        $select = $bdd->prepare("SELECT * from user WHERE nom = 'Doe' AND prenom = 'John'");
        $ref = $select->execute();
        echo "<br><div class='info'> Utilisateur(s) dont le nom est 'Doe' ET le prénom est 'John' : ";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div>".$user['prenom']." ".$user['nom']."</div>";
            }
        }
        echo "</div>";

    /* 8. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' OU le prénom est 'Jane' */
    // TODO Votre code ici.

        $select = $bdd->prepare("SELECT * from user WHERE nom = 'Conor' OR prenom = 'Jane'");
        $ref = $select->execute();
        echo "<br><div class='info'> Utilisateur(s) dont le nom est 'Conor' OU le prénom est 'Jane' : ";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div>".$user['prenom']." ".$user['nom']."</div>";
            }
        }
        echo "</div>";

    /* 9. Sélectionnez et affichez tous les utilisateurs en limitant les réultats à 2 résultats */
    // TODO Votre code ici.

        $select = $bdd->prepare("SELECT * from user LIMIT 2");
        $ref = $select->execute();
        echo "<br><div class='info'> Utilisateur(s) en limitant les réultats à 2 : ";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div>".$user['prenom']." ".$user['nom']."</div>";
            }
        }
        echo "</div>";

    /* 10. Sélectionnez et affichez tous les utilisateurs par ordre croissant, en limitant le résultat à 1 seul enregistrement */
    // TODO Votre code ici.

        $select = $bdd->prepare("SELECT * from user ORDER BY nom ASC LIMIT 1");
        $ref = $select->execute();
        echo "<br><div class='info'> Utilisateur(s) par ordre croissant, en limitant le résultat à 1 seul enregistrement : ";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div>".$user['prenom']." ".$user['nom']."</div>";
            }
        }
        echo "</div>";

    /* 11. Sélectionnez et affichez tous les utilisateurs dont le nom commence par C, fini par r et contient 5 caractères ( voir LIKE )*/
    // TODO Votre code ici.

        $select = $bdd->prepare("SELECT * from user WHERE nom LIKE 'C___r'");
        $ref = $select->execute();
        echo "<br><div class='info'> Utilisateur(s) dont le nom commence par C, fini par r et contient 5 caractères : ";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div>".$user['prenom']." ".$user['nom']."</div>";
            }
        }
        echo "</div>";

    /* 12. Sélectionnez et affichez tous les utilisateurs dont le nom contient au moins un 'e' */
    // TODO Votre code ici.

        $select = $bdd->prepare("SELECT * from user WHERE nom LIKE '%e%'");
        $ref = $select->execute();
        echo "<br><div class='info'> Utilisateur(s) dont le nom contient au moins un 'e' : ";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div>".$user['prenom']." ".$user['nom']."</div>";
            }
        }
        echo "</div>";

    /* 13. Sélectionnez et affichez tous les utilisateurs dont le prénom est ( IN ) (John, Sarah) ... voir IN , pas OR '' */
    // TODO Votre code ici.

        $select = $bdd->prepare("SELECT * from user WHERE prenom IN ('John', 'Sarah')");
        $ref = $select->execute();
        echo "<br><div class='info'> Utilisateur(s) dont le prénom est ( IN ) (John, Sarah) : ";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div>".$user['prenom']." ".$user['nom']."</div>";
            }
        }
        echo "</div>";

    /* 14. Sélectionnez et affichez tous les utilisateurs dont l'id est situé entre 2 et 4 */
    // TODO Votre code ici.

        $select = $bdd->prepare("SELECT * from user WHERE id BETWEEN 2 AND 4");
        $ref = $select->execute();
        echo "<br><div class='info'> Utilisateur(s) dont l'id est situé entre 2 et 4 : ";
        if($ref) {
            foreach ($select->fetchAll() as $user){
                echo "<div>".$user['id']." ".$user['prenom']." ".$user['nom']."</div>";
            }
        }
        echo "</div>";

    }
    catch (PDOException $exception) {
        echo $exception->getMessage();
    }
?>
    </div>
</body>
</html>





