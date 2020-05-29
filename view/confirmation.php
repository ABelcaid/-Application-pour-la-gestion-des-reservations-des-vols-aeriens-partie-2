<?php
include '../controller/confirmation-back.php';
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!-- <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sky flight</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">


    <link type="text/css" rel="stylesheet" href="css/style.css" />
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">






</head> -->
<?php
include('heder.php');
?>

<body>
<?php
include('navbar.php');
?>
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">SKY FLIGHT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="#">Accueil </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="userinfo.php">Informations personnels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#historique">Mes réservations</a>
                </li>

            </ul>


            <ul class="navbar-nav ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <?= $_SESSION["nom"]; ?> <?= $_SESSION["prenom"]; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Statut : <samp><?= $_SESSION["statut"]; ?></samp></a>
                        <a class="dropdown-item" href="#">Je me déconnecte</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Faq</a>
                    </div>
                </li>
            </ul>



        </div>
    </nav> -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-3 bg-info p-2 rounded">
                <h2 class="bg-light p-2 rounded text-center text-dark">Ticket N° : <?= $row2['id']; ?></h2>
                <h4 class="text-light">Nom : <?= $row2['nom']; ?> </h4>
                <h4 class="text-light">Prenom : <?= $row2['prenom'] ?> </h4>
                <h4 class="text-light">Age : <?= $row2['age']; ?> </h4>
                <h4 class="text-light">Pays : <?= $row2['pays'] ?> </h4>
                <h4 class="text-light">Depart : <?= $row1['depart']; ?> </h4>
                <h4 class="text-light">Destination : <?= $row1['destination'] ?> </h4>
                <h4 class="text-light">Date De Part : <?= $row1['date_depart']; ?> </h4>
                <h4 class="text-light">Prix : <?= $row1['prix'] ?> </h4>
                <hr>
                <button type="button" class="btn bg-light p-2 rounded text-center text-dark" data-toggle="modal"
                    data-target="#exampleModal">
                    Confirmer
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Êtes-vous sûr ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-danger"><a href="index.php"> Confirmer</a></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>


    <div class="blink" style="margin-top: 200px;"></div>




    <!-- <div class="card text-center">
        <div class="card-header">
            Fonctionnalités
        </div>
        <div class="card-body">
            <h5 class="card-title">© 2020 Sky flight </h5>
            <p class="card-text">Tous droits réservés </p>
            <a href="index.php" class="btn btn-primary">Retour à l'accueil</a>
        </div>
        <div class="card-footer text-muted">
            Il y a deux jours
        </div>
    </div> -->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script> -->

    <?php
include('script.php');
?>

</body>

</html>