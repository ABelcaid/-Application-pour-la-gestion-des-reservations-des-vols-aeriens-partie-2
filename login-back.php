<?php

include('dbconnection.php');

session_start();

if(isset($_POST['go'])){

	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$mail = $_POST['mail'];
    $password = $_POST['password'];
	$statut = "User";

	

	$query= "SELECT * FROM users WHERE email=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s",$mail);
	$stmt->execute();
	$result= $stmt->get_result();
	$row1 = mysqli_num_rows($result);


	// The mysqli_num_rows() function returns the number of rows in a result set.

	
	if ($row1 == 1) {
		
		echo "user already taken";
	} else {
		
		$stmt = $conn->prepare("INSERT Into users (nom, prenom, email,password, statut) values(?,?,?,?,?)");
		$stmt->bind_param("sssss", $nom, $prenom, $mail, $password, $statut);
		$stmt->execute();
		
		header("Location: login.php");
	}
	
	


}
if(isset($_POST['go2'])){

	$mail = $_POST['mail'];
    $password = $_POST['password'];
	

	$query= "SELECT * FROM users WHERE email=? && password =? ";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("ss",$mail,$password);
	$stmt->execute();
	$result= $stmt->get_result();
	$row1 = mysqli_num_rows($result);
	$row2 = $result->fetch_assoc();

	$_SESSION["nom"] = $row2["nom"];
	$_SESSION["prenom"] = $row2["prenom"];
	$_SESSION["statut"] =  $row2["statut"];
	$_SESSION["id_user"] =  $row2["id_user"];

	// The mysqli_num_rows() function returns the number of rows in a result set.


	if ($row1 == 1 ) {
		if ($row2["statut"] == "Admin") {
			header("Location: admin.php");
			# code...
		} else {
			# code...
			header("Location: index2.php");
			

		}
		
		
		
	} else {
		header("Location: index.php");
		
	}
	
	
}







?>