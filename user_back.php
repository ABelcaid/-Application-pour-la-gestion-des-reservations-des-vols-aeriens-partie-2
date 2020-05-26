<?php

include('dbconnection.php');


if(ISSET($_POST['update_user_info'])){
  
  $id = $_POST['id'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $mail = $_POST['mail'];
  $password = $_POST['password'];
 
  
  mysqli_query($conn, "UPDATE `users` SET `nom` = '$nom', `prenom` = '$prenom', `email` = '$mail' , `password` = '$password' WHERE `id_user` = '$id'") or die(mysqli_error());

  header("location: login.php");
}


?>