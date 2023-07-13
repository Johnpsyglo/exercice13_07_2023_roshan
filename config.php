<?php
 $motDePasse = "";
 $serveur = "localhost";// permet de s'indentifier en tapent :"localhost"
 $utilisateur = "root"; // permet de s'indentifier en tapent :"root"
 $baseDeDonnees = "base_de_donner_blog"; /* permet de presenter son fichier en tapent
 exemple:"bac_a_sable ou test*/


 $conn = new PDO("mysql:host=$serveur;dbname=$application_base_données",$idPrenom,$nom,$email,$mots_de_pass);

echo "ceci est un test reussit";



?>