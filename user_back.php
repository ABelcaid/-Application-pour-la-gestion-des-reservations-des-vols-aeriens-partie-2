<?php

include('usersclass.php');


if(ISSET($_POST['update_user_info'])){
  
  $id = $_POST['id'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $mail = $_POST['mail'];
  $password = $_POST['password'];

  $user = new User();
  $user -> user_update($id,$nom, $prenom,$mail, $password);
 
  
  // mysqli_query($conn, "UPDATE `users` SET `nom` = '$nom', `prenom` = '$prenom', `email` = '$mail' , `password` = '$password' WHERE `id_user` = '$id'") or die(mysqli_error());

  header("location: login.php");
}


?>