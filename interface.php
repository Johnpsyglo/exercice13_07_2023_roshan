<?php
include("./initconnexion.php");
include("./create.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>interface application_base_données</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <h1>client</h1>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">client</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Insertion</h6>


            <form method="POST" action="insertion.php">
                <div class="mb-3">
                    <label for="idPrenom_client" class="form-label">idPrenom</label>
                    <input type="text" class="form-control" id="idPrenom_client" placeholder="" name="idPrenom" require>
                </div>

                <div class="mb-3">
                    <label for="nom_client" class="form-label">nom</label>
                    <input type="text_adresse" class="form-control" id="nom_client" placeholder="" name="nom" require>
                </div>

                <div class="mb-3">
                    <label for="email_client" class="form-label">email</label>
                    <input type="text_email" class="form-control" id="email_client" placeholder="" name=email>
                </div>
                <div class="mb-3">
                    <label for="mots_de_pass_client" class="form-label">mots_de_pass</label>
                    <input type="mots_de_pass_email" class="form-control" id="mots_de_pass_client" placeholder="" name=mots_de_pass>
                </div>

                <button type="submit" class="btn btn-outline-success">Validé</button>
            </form>

        </div>
    </div>
    <table class="table table-dark table-hover">
        <thead>
            <tr>idPrenom</tr>
            <tr>nom</tr>
            <tr>email</tr>
            <tr>mots_de_pass</tr>
        </thead>
        <tbody>
            <?php
           $test = new MaConnexion("application_base_données", "", "root", "localhost");
           $tabResultat = $test->select("client", "*");
            foreach ($table as $column) {
                echo '<tr>';
                echo '<td>' . $uneDonnees['idPrenom'] . '</td>';
                echo '<td>' . $uneDonnees['nom'] . '</td>';
                echo '<td>' . $uneDonnees['email'] . '</td>';
                echo '<td>' . $uneDonnees['mots_de_pass'] . '</td>';
                echo '<tr>';
            }
            ?>
        </tbody>
    </table>


    <h3>Client1</h3>


    <table class="table">
        <thead>
            <tr> //en tete du tableau
                <th scope="col">idPrenom</th>
                <th scope="col">nom</th>
                <th scope="col">email</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Og</td>
                <td>Gang</td>
                <td>oggang@gmail.com</td>
            </tr>
            <?php
            //////appel un new instance//
            $newInstance = new MaConnexion("application_base_données", "", "root", "localhost");
            ///declare mon new tableau//
            $newTableau;
            $newTableau = $newInstance->select("client", "*");
            foreach ($newTableau as $newItem) {
                echo '<tr>
                        <td>' . $newItem['idPrenom'] . '</td>
                        <td>' . $newItem['nom'] . '</td>
                        <td>' . $newItem['email'] . '</td>
                        <tr>';
            }


            ?>
        </tbody>
    </table>

    <h3>nouveau client</h3>


    <table class="table table-dark table-hover">
        <thead>
            <tr>idPrenom</tr>
            <tr>nom</tr>
            <tr>email</tr>
        </thead>
        <tbody>
            <?php
            foreach ($tabResultat as $uneDonnees) {
                echo '<tr>';
                echo '<td>' . $uneDonnees['idPrenom'] . '</td>';
                echo '<td>' . $uneDonnees['nom'] . '</td>';
                echo '<td>' . $uneDonnees['email'] . '</td>';
                echo '<tr>';
            }
            ?>
        </tbody>
    </table>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">client2</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Insertion</h6>


            <form method="POST" action="insertion.php">
                <div class="mb-3">
                    <label for="idPrenom_client2" class="form-label">idPrenom</label>
                    <input type="text" class="form-control" id="idPrenom_client2" placeholder="" name="idPrenom" require>
                </div>

                <div class="mb-3">
                    <label for="nom_client2" class="form-label">nom</label>
                    <input type="text_adresse" class="form-control" id="nom_client2" placeholder="" name="nom" require>
                </div>

                <div class="mb-3">
                    <label for="email_client2" class="form-label">email</label>
                    <input type="text_email" class="form-control" id="email_client2" placeholder="" name=email>
                </div>

                <!-- <div class="mb-3">
                    <label for="id_patient" class="form-label">id_patient</label>
                    <input type="hidden_idpatient" class="form-control" id="id_patient" placeholder="Tadoe@gmail.com" name=idpatient>
                </div> -->

                <button type="submit" class="btn btn-outline-success">Ajout</button>
                <button type="button" class="btn btn-outline-modif">Modif</button>
                <button type="button" class="btn btn-outline-danger">suppr</button>
            </form>

        </div>
    </div>


    <h3>Client2</h3>

    <table class="table table-dark table-hover">
        <thead>
            <tr> //en tete du tableau
                <th scope="col">idPrenom</th>
                <th scope="col">nom</th>
                <th scope="col">email</th>
                <!-- <th scope="col">Action</th> -->

            </tr>

        </thead>
        <tbody>


            <?php
            //////appel un new instance//
            $newInstance = new MaConnexion("application_base_données", "", "root", "localhost");
            ///declare mon new tableau//
            $newTableau;
            $newTableau = $newInstance->select("client3", "*"); //permet de selecter la classe client3
            foreach ($newTableau as $newItem) {

                echo '<tr>';
                echo '<form method="POST" action="modificationpatient.php">
                <input type="hidden" name="id" value="' . $newItem['idclient3'] .
                    '"required>
                


                <td><input type="text" class="form-control" id="idPrenom_client3" placeholder="chief keef" name="idPrenom" value="' . $newItem['idPrenom_client3'] . '"required></td>
             
                <td><input type="text_adresse" class="form-control" id="nom_client3" placeholder="oblock" name="nom"  value="' . $newItem['nom'] . '"required></td>
             
                <td><input type="text_email" class="form-control" id="email_client3" placeholder="chiefso@gmail.com" name="email" value="' . $newItem['email'] . '"required></td>

                
             
             <td>
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
             Ajouter
             </button>
                    <button type="submit" class="btn btn-outline-info">Modif</button>
                    <button type="target" class="btn btn-outline-info">Suppr</button>
                </td>
                
                </form>
                <tr>';
            }


            ?>
        </tbody>
    </table>
    /////////////////////////////////////////////////////////////////

    <div class="card-body">

        <h5 class="card-title">Patient</h5>

        <h6 class="card-subtitle mb-2 text-body-secondary">Insertion</h6>


        <form method="POST" action="insertion.php">
            <div class="mb-3">
                <label for="idPrenom_patient" class="form-label">idPrenom</label>
                <input type="text" class="form-control" id="idPrenom_patient" placeholder="fredo, capo" name="idPrenom" require>
            </div>

            <div class="mb-3">
                <label for="nom_patient" class="form-label">nom</label>
                <input type="text_adresse" class="form-control" id="nom_patient" placeholder="6 rue New York city" name="nom" require>
            </div>

            <div class="mb-3">
                <label for="email_patient" class="form-label">email_patient</label>
                <input type="text_email" class="form-control" id="email_patient" placeholder="Tadoe@gmail.com" name=email>
            </div>


        </form>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <form method="POST" action="./modifierclient.php">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">voulez vous ajouter</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        ////////////////////////////////////ici on met le modal
                        <div class="mb-3">
                            <label for="idPrenom_patient" class="form-label">idPrenom</label>
                            <input type="text" class="form-control" id="idPrenom_patient" placeholder="fredo, capo" name="prenom" require>
                        </div>

                        <div class="mb-3">
                            <label for="nom_patient" class="form-label">nom</label>
                            <input type="text_adresse" class="form-control" id="nom_patient" placeholder="New York city" name="nom" require>
                        </div>

                        <div class="mb-3">
                            <label for="email_patient" class="form-label">email_patient</label>
                            <input type="text_email" class="form-control" id="email_patient" placeholder="fredo@gmail.com" name=email>
                        </div>
                        //////////ici on met le modal
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Envoye</button>
                    </div>
                </div>
            </div>
        </div>


    </form>

    

    <form action="./supp.php" method="post">

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">etre-vous sur de supprimer</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        ////////////////////////////////////ici on met le modal
                        <div class="mb-3">
                            <label for="idPrenom_patient" class="form-label">idPrenom</label>
                            <input type="text" class="form-control" id="idPrenom_patient" placeholder="fredo, capo" name="idPrenom" require>
                        </div>

                        <div class="mb-3">
                            <label for="nom_patient" class="form-label">nom</label>
                            <input type="text_adresse" class="form-control" id="nom_patient" placeholder="6 rue New York city" name="nom" require>
                        </div>

                        <div class="mb-3">
                            <label for="email_patient" class="form-label">email_patient</label>
                            <input type="text_email" class="form-control" id="email_patient" placeholder="Tadoe@gmail.com" name=email>
                        </div>
                        //////////ici on met le modal
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </form>








</body>

</html>