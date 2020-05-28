<?php

include('dbconnection.php');
session_start();

								if(isset($_POST['add'])){
								$nom = $_POST['nom'];
								$prenom = $_POST['prenom'];
								$age = $_POST['age'];
								$pays = $_POST['pays'];
								$adresse = $_POST['adresse'];
								$tele = $_POST['tele'];
								$email = $_POST['email'];
								$passeport = $_POST['passeport'];


								$id = $_POST['id'];
								echo $id;

								$stmt = $conn->prepare("INSERT Into passager (nom, prenom, age, pays, adresse, tele, email, num_passport) values(?,?,?,?,?,?,?,?)");
								$stmt->bind_param("ssissisi", $nom, $prenom, $age, $pays, $adresse, $tele, $email, $passeport);
								$stmt->execute();


								$latest_id = $conn->insert_id;
								
								$id_user = $_SESSION["id_user"];
								
								$date = date('Y-m-d H:i:s');
								$stmt = $conn->prepare("INSERT Into reservation (vol_id,passager_id,id_user,date_reservation) values(?,?,?,?)");
								$stmt->bind_param("iiis",$id,$latest_id,$id_user,$date);
								$stmt->execute();

								$latest_id_reservation = $conn->insert_id;  
								$stmt->close();
								
								header("Location: confirmation.php?id=$latest_id_reservation");

								}
								
								

								?>