<?php

// include('dbconnection.php');

// session_start();
include('../model/usersclass.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="../public/css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Sky flight </div>
            <div class="list-group list-group-flush">
                <!-- <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a> -->
                <a href="admin.php" class="list-group-item list-group-item-action bg-light">List des vols</a>
                <!-- <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a> -->
                <!-- <a href="#" class="list-group-item list-group-item-action bg-light">Events</a> -->
                <a href="admin_profile.php" class="list-group-item list-group-item-action bg-light">Profile</a>
                <!-- <a href="#" class="list-group-item list-group-item-action bg-light">Status</a> -->
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

        <?php
include('navbar.php');
?>

            <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

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

          
            <?php
        $id = $_SESSION["id_user"];
        $user = new User();
        $res = $user -> user_show($id);
        $row = $res->fetch_assoc();
        // echo $id;
        // $query = "SELECT * from users where id_user='$id' ";
        // $stmt = $conn->prepare($query);
        // $stmt->execute();
        // $result = $stmt->get_result();
        // $row = $result->fetch_assoc();
      ?>
            <div>
                <div class="container">
                    <div class="row">
                        <!-- <div class="col-md-3 ">
                            <div class="list-group ">
                                <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
                                <a href="#" class="list-group-item list-group-item-action">User Management</a>
                                <a href="#" class="list-group-item list-group-item-action">Used</a>
                                <a href="#" class="list-group-item list-group-item-action">Enquiry</a>
                                <a href="#" class="list-group-item list-group-item-action">Dealer</a>
                                <a href="#" class="list-group-item list-group-item-action">Media</a>
                                <a href="#" class="list-group-item list-group-item-action">Post</a>
                                <a href="#" class="list-group-item list-group-item-action">Category</a>
                                <a href="#" class="list-group-item list-group-item-action">New</a>
                                <a href="#" class="list-group-item list-group-item-action">Comments</a>
                                <a href="#" class="list-group-item list-group-item-action">Appearance</a>
                                <a href="#" class="list-group-item list-group-item-action">Reports</a>
                                <a href="#" class="list-group-item list-group-item-action">Settings</a>


                            </div>
                        </div> -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Admin Profile</h4>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="POST" action="../controller/admin_back.php" >
                                                <div class="form-group row">
                                                    <label for="username" class="col-4 col-form-label">
                                                        NOM</label>
                                                    <div class="col-8">
                                                    <input  name="id" value="<?= $row['id_user']; ?>" type="hidden">

                                                        <input id="username" name="nom" value="<?= $row['nom']; ?>"
                                                            class="form-control here" required="required" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name" class="col-4 col-form-label">PRENOM</label>
                                                    <div class="col-8">
                                                        <input id="name" name="prenom" value="<?= $row['prenom']; ?>"
                                                            class="form-control here" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lastname" class="col-4 col-form-label">EMAIL</label>
                                                    <div class="col-8">
                                                        <input id="lastname" name="mail" value="<?= $row['email']; ?>"
                                                            class="form-control here" type="email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="text" class="col-4 col-form-label">PASSWORD</label>
                                                    <div class="col-8">
                                                        <input id="text" name="password" value="<?= $row['password']; ?>"
                                                            class="form-control here" required="required" type="password">
                                                    </div>
                                                </div>
                                            
                                                
                                                
                                                <div class="form-group row">
                                                    <div class="offset-4 col-8">
                                                        <button name="update_admin_info" type="submit"
                                                            class="btn btn-primary">Modifier mon Profile</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Bootstrap core JavaScript -->
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                crossorigin="anonymous">
            </script> -->
            <?php
include('script.php');
?>

            <!-- Menu Toggle Script -->
            <script>
                $("#menu-toggle").click(function (e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });
            </script>

</body>

</html>