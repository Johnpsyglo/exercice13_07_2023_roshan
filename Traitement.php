<?php
//$post["identifiant]; permet de identifier notre base de donnée
$_POST["nom"];
$_POST["email"];
$_POST["mots_de_pass"];

//permet de inclure le fichier php connexion.php
include("./connexion.php");

// permet de faire un appelle au constructeur et un nouvelle connexion dans la base de donnée
$uneConnexion = new $MaConnexion("application_base_données", "", "root", "localhost");
$resultat = $uneConnexion->selectUtilisateur($_POST["nom"], $_POST["email"], $_POST["mots_de_pass"]);


if (!empty($resultat)) {
    echo "youpi !";
}
else{
    echo "b non !";
}



?>