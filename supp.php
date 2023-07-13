<?php

include("./initconnexion.php");

$newInsertion = new MaConnexion("application_base_données", "", "root", "localhost");
$newInsertion->Delete($_POST["idPrenom"],$_POST["nom"], $_POST["email"], $_POST["mots_de_pass"]);

header("location: interface.php");


?>