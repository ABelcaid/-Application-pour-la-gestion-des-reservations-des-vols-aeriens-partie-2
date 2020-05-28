<?php

// include('dbconnection.php');

session_start();
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
  <link href="css/simple-sidebar.css" rel="stylesheet">

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

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">

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
      </nav>

    

      <div class="col-md-6 well">
		<h3 class="text-primary">List des vols desponible</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Ajouter des vols</button>
		<br /><br />
		<table class="table table-bordered">
			<thead class="alert-success">
				<tr>
					<th>Date départ</th>
					<th>Ville du départ</th>
					<th>Ville d'arrivée</th>
					<th>Nombre de Places</th>
					<th>Prix</th>
					<th>Staut de vol</th>
					<th>Action</th>

				</tr>
			</thead>
			<tbody style="background-color:#fff;">
				<?php
					require 'dbconnection.php';
					$query = mysqli_query($conn, "SELECT * FROM `vols`") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
				<tr>
					<td><?php echo $fetch['date_depart']?></td>
					<td><?php echo $fetch['depart']?></td>
					<td><?php echo $fetch['destination']?></td>
					<td><?php echo $fetch['num_place']?></td>
					<td><?php echo $fetch['prix']?></td>
					<td><?php echo $fetch['statut']?></td>
					<td><button class="btn btn-warning" data-toggle="modal" type="button" data-target="#update_modal<?php echo $fetch['id']?>"><span class="glyphicon glyphicon-edit"></span> Edit</button></td>
				</tr>
				<?php
					
					include 'vol_update.php';
					
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="admin_back.php">
					<div class="modal-header">
						<h3 class="modal-title">Ajouter des vols</h3>
					</div>
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Date départ:</label>
								<input type="datetime-local" class="form-control" id="recipient-name" required="required" name="date_depart">
							</div>
							<div class="form-group">
								<label>Ville du départ:</label>
								<input type="text" class="form-control" id="recipient-name" required="required" name="vdepart">
							</div>
							<div class="form-group">
								<label>Ville d'arrivée:</label>
								<input type="text" class="form-control" id="recipient-name" required="required" name="varrivee">
							</div>
							<div class="form-group">
								<label>Nombre de Places:</label>
								<input type="number" class="form-control" id="recipient-name" required="required" name="npalace">
							</div>
							<div class="form-group">
								<label>Prix:</label>
								<input type="text" name="prix" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Staut de vol:</label>
								<input type="text" class="form-control" id="recipient-name" required="required"  name="statut">
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
						<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>	







     




    </div>



    <!-- Bootstrap core JavaScript -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <!-- Menu Toggle Script -->
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>

</body>

</html>