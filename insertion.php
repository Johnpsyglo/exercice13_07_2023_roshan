<?php

include("./initconnexion.php");

$newInsertion = new MaConnexion("application_base_données", "", "root", "localhost"); //$ plus nom de la variable= declarer la varaiable
//new maconnexion = permet de creer un instance .//johndoe = base de donnée //utilisateur= utilisateur de base de donnee//localhost = host chemin d'acces au server
$newInsertion->InsertionClient_secure($_POST["idPrenom"], $_POST["nom"], $_POST["email"], $_POST["mots_de_pass"]);// new maconnexion = new construction
//$newinsertion n7 =instance de ma classe MaConnexion// -> insertion_secure = permet avoir ou appeller la fonction de MA classe . // () du fonction = parametre
header("location: interface.php");// header = modifie l'en tete de la requete http pour pointe vers le nouveau chemin


?>