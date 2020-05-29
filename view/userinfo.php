<?php
// include('dbconnection.php');
include('../model/usersclass.php');
// session_start();				

?>
<!DOCTYPE html>
<html lang="en">
<!-- 
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sky flight</title>

	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">



	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">





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




	<?php
   $id = $_SESSION["id_user"];
   $user = new User();
   $res = $user -> user_show($id);
   $row = $res->fetch_assoc();
   
   
//    $query = "SELECT * from users where id_user='$id'";
//    $stmt = $conn->prepare($query);
// 	$stmt->execute();
//     $result = $stmt->get_result();
//     $row = $result->fetch_assoc();

    // echo $row["email"];
    ?>

	<div style="height:100vh">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<h4>User Profile</h4>
									<hr>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<form method="POST" action="../controller/user_back.php">
										<div class="form-group row">
											<label for="username" class="col-4 col-form-label">
												NOM</label>
											<div class="col-8">
												<input name="id" value="<?= $row['id_user']; ?>" type="hidden">

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
												<button name="update_user_info" type="submit"
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


	<!-- <div style="height:100vh" id="historique">
		<h1>Historique des commandes</h1>

		<div>
			<?php
      
        // echo $id;
        $query = "SELECT * FROM reservation INNER JOIN users ON reservation.id_user=users.id_user";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        
      ?>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Depart</th>
						<th scope="col">Destinaton</th>
						<th scope="col">More info</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = $result->fetch_assoc()) { ?>
					<td><?= $row['nom']; ?></td>
					<td><?= $row['prenom']; ?></td>
					<td><?= $row['id']; ?></td>


					</tr>
					<?php } ?>
				</tbody>
			</table>
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
include('scprit.php');
?>

</body>

</html>