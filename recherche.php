<?php
include('dbconnection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sky flight</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">



	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">





</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
	</nav>



	<div class="container text-center">
		<form method="post" action="recherche">
			<h1>Resultats des recherches</h1>


	</div>

	<!-- <div class="flex">
		<section class="t">
			<div class="container py-3">
				<div class="card">
					<div class="row ">
						<div class="form-btn formrecherche">
							<form method="post" action="recherche">
								<div class="row">
									<h1> Resultats des recerches </h1>
								</div>
						</div>
					</div>
				</div>
		</section>
	</div> -->
	<div id="booking" class="container">
		<div class="row">
			<div class="col-12">
				<?php
				$villedepart = $_POST['villedepart'];
				$villearrivee = $_POST['villearrivee'];


				$query = "SELECT * from vols where depart='$villedepart' AND destination='$villearrivee' AND num_place > 0";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->get_result();
				?>
				<!-- <table class="table table-bordered">
					<thead>
						<tr>
							<th scope="col">Date départ</th>
							<th scope="col">Ville du départ</th>
							<th scope="col">Ville d'arrivée</th>
							<th scope="col">Nombre de Places</th>
							<th scope="col">Reservation</th>
						</tr>
					</thead>
					<tbody> -->
						<tr>
							<?php
							$row_cnt = $result->num_rows; 
							if($row_cnt <= 0)
							echo " Aucun résultat trouvé";							
							else{
								echo"<table class='table table-bordered'>
					<thead>
						<tr>
							<th scope='col'>Date départ</th>
							<th scope='col'>Ville du départ</th>
							<th scope='col'>Ville d'arrivée</th>
							<th scope='col'>Nombre de Places</th>
							<th scope='col'>Reservation</th>
						</tr>
					</thead>
					<tbody>";
							while ($row = $result->fetch_assoc()) { ?>
								<td><?= $row['date_depart']; ?></td>
								<td><?= $row['depart']; ?></td>
								<td><?= $row['destination']; ?></td>
								<td><?= $row['num_place']; ?></td>
								<td>
									<a class="btn btn-success" href="reservation.php?id=<?= $row['id']; ?>" type="button">Reserver</i></a>
								</td>
						</tr>
					<?php }} ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
	












	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>