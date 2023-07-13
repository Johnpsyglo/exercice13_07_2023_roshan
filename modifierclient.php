<?php

include("./initconnexion.php");

$newInsertion = new MaConnexion("application_base_données", "", "root", "localhost");
$resultat = $uneConnexion->select($_POST['idPrenom'], $_POST['nom'], $_POST['email'],$_POST['mots_de_pass']);

// echo "bio";
header("location: interface.php");


?>