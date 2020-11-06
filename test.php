<?php
//pour y acceder : localhost/test.php

$base = "testDB.sqlite"; //on ouvre ou crée une bd qui s'appelle testDB.sqlite

// Connexion à la db
try {
    $db = new PDO("sqlite:$base"); //Ouvre si elle existe sinon le cree une
    //PDO = PHP Database Objet (à approffondir sur le sujet)

    // Inserer ici les requêtes
    $db->exec("CREATE TABLE groups(id INTEGER PRIMARY KEY, name TEXT, email TEXT);");

    $db->exec("INSERT INTO groups(id, name, email) VALUES(1, 'Amy', 'amy@mail.com');");
    $db->exec("INSERT INTO groups(id, name, email) VALUES(2, 'Boby', 'Boby@mail.com');");
    $db->exec("INSERT INTO groups(id, name, email) VALUES(3, 'Cindy', 'Cindy@mail.com');");
    $db->exec("INSERT INTO groups(id, name, email) VALUES(4, 'Danny', 'Danny@mail.com');");
    $db->exec("INSERT INTO groups(id, name, email) VALUES(5, 'Elly', 'Elly@mail.com');");
    $db->exec("INSERT INTO groups(id, name, email) VALUES(6, 'Fanny', 'Fanny@mail.com');");

    /* D'après mes tests :
            _ la db se crée dans le fichier où se trouve le script qui l'a crée (ici c'est le file test.php)
            _ si on veut que la db se crée dans une sous-dossier par exemple "db",
              il faut faire $base = "db/testDB.sqlite" --> ATTENTION, il faut que le sous-dossier existe déjà sinon erreur
            _ d'après ce que j'ai essayé, les données dans la db se conservent
            _ Attention, si on ajoute une donnée dont la clé primaire existe déjà, la donnée ne sera pas ajouté
              et on ne sera pas prévenu de l'erreur, donc il faut faire gaffe sinon on peut perdre des data

    Note 1 : On IDE indique qu'il y a peut-être une erreur dans les requêtes (à vérifier mais de mon côté tout marche)
    Note 2 : on peut aussi créer une db avec new SQLite3 mais il va falloir modifier les arg du constructeur,
             peut-etre aussi les requetes et l'affichage. Par contre avec cette méthode, les erreurs de donnée sont signalé

    */

    //Pour afficher sur le site
    print "<table border=1>";

    print "<tr><td>Id </td><td> Name </td><td> Email</td></tr>";

    $result = $db->query("SELECT * from groups");

    foreach($result as $row){
        print "<tr><td>" . $row['id'] . "</td>";
        print "<td>" . $row['name'] . "</td>";
        print "<td>" . $row['email'] . "</td></tr>";
    }

    print "</table>";

} catch (SQLiteException $e) {
    echo $e->getMessage();
}

// Deconnexion
$bd = null;

/* Index :
   _ https://www.youtube.com/watch?v=5FrAUXFhy9I
   _ https://www.sqlitetutorial.net/sqlite-php/connect/
   _ https://www.youtube.com/watch?v=bR3nxnCGqmY
*/
