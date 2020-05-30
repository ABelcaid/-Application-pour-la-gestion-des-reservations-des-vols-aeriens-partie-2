<?php

include('../model/usersclass.php');
include('../model/passager_class.php');
include('../model/reservation_class.php');
include('../model/volsclass.php');



if(ISSET($_POST['update_user_info'])){
  
  $id = $_POST['id'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $mail = $_POST['mail'];
  $password = $_POST['password'];

  $user = new User();
  $user -> user_update($id,$nom, $prenom,$mail, $password);
 
  
  // mysqli_query($conn, "UPDATE `users` SET `nom` = '$nom', `prenom` = '$prenom', `email` = '$mail' , `password` = '$password' WHERE `id_user` = '$id'") or die(mysqli_error());

  header("location: ../view/login.php");
}


if(ISSET($_POST['rid'])){

  $id =$_POST['rid'];
  $output = '';
  $output2 = '';


  $reservation = new Reservation();
  $res = $reservation -> reservation_show_id($id);
  $rowid = $res->fetch_assoc(); 

  $vol = new Vol();
  $res1 = $vol -> vol_show_id($rowid['vol_id']);
//   $row1 = $res->fetch_assoc();


  $passager = new Passager();
  $res2 = $passager -> passager_show_id($rowid['passager_id']);
//   $row2 = $res->fetch_assoc();

  $output .= '  
  <div class="table-responsive">  
       <table class="table table-bordered">';  
  while( $row2 = $res2->fetch_assoc())  
  {  
       $output .= '  
            <tr>  
                 <td width="30%"><label>Name</label></td>  
                 <td width="70%">'.$row2["nom"].'</td>  
            </tr>  
            <tr>  
                 <td width="30%"><label>Address</label></td>  
                 <td width="70%">'.$row2["adresse"].'</td>  
            </tr>  
            <tr>  
                 <td width="30%"><label>mail</label></td>  
                 <td width="70%">'.$row2["email"].'</td>  
            </tr>  
            <tr>  
                 <td width="30%"><label>age</label></td>  
                 <td width="70%">'.$row2["age"].'</td>  
            </tr>  
            <tr>  
                 <td width="30%"><label>tele</label></td>  
                 <td width="70%">'.$row2["tele"].' </td>  
            </tr>  
            ';  
  }  
  $output .= "</table></div>";  
//   echo $output;






//   ----------------------------------------------
$output2 .= '  
  <div class="table-responsive">  
       <table class="table table-bordered">';  
  while( $row1 = $res1->fetch_assoc())  
  {  
       $output2 .= '  
            <tr>  
                 <td width="30%"><label>Name</label></td>  
                 <td width="70%">'.$row1["id"].'</td>  
            </tr>  
            <tr>  
                 <td width="30%"><label>Address</label></td>  
                 <td width="70%">'.$row1["id"].'</td>  
            </tr>  
            <tr>  
                 <td width="30%"><label>mail</label></td>  
                 <td width="70%">'.$row1["id"].'</td>  
            </tr>  
            <tr>  
                 <td width="30%"><label>age</label></td>  
                 <td width="70%">'.$row1["id"].'</td>  
            </tr>  
            <tr>  
                 <td width="30%"><label>tele</label></td>  
                 <td width="70%">'.$row1["id"].' </td>  
            </tr>  
            ';  
  }  
  $output2 .= "</table></div>";  

  
}


// $result =  $output2;

  $result = $output . $output2;
echo $result;


?>
