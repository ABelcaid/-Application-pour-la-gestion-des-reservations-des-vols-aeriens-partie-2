<?php
include('dbconnection.php');

$id = $_GET['id'];
  
$query= "SELECT * FROM reservation WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i",$id);
$stmt->execute();
$result= $stmt->get_result();
$rowid = $result->fetch_assoc();






$query= "SELECT * FROM vols WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i",$rowid['vol_id']);
$stmt->execute();
$result= $stmt->get_result();
$row1 = $result->fetch_assoc();

// echo $row1['depart'];


$query= "SELECT * FROM passager WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i",$rowid['passager_id']);
$stmt->execute();
$result= $stmt->get_result();
$row2 = $result->fetch_assoc();


// echo $row2['nom'];








?>

