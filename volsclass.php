<?php
// include('dbconnection.php');
session_start();


 class Vol{

		function __construct() {
			$this->conn = new mysqli("localhost","root","belcaid","gestion_reservations");
		}

		function vol_insert($vdepart, $varrivee,$date_depart, $npalace,$prix,$statut) {	


            $stmt =$this->conn->prepare("INSERT Into vols (depart, destination, date_depart,num_place, prix, statut) values(?,?,?,?,?,?)");
				$stmt->bind_param("sssiis", $vdepart, $varrivee,$date_depart, $npalace,$prix,$statut);
				$stmt->execute();
		}
		
		function vol_update($id,$vdepart, $varrivee,$date_depart, $npalace,$prix,$statut) {

            mysqli_query($this->conn, "UPDATE `vols` SET `depart` = '$vdepart', `destination` = '$varrivee', `date_depart` = '$date_depart' , `num_place` = '$npalace', `prix` = '$prix'  , `statut` = '$statut' WHERE `id` = '$id'") or die(mysqli_error($this->conn));


           
			
        }
        




		// function user_show($id) {

		// 		$query = "SELECT * from users where id_user='$id'";
		// 		$stmt = $this->conn->prepare($query);
		// 		$stmt->execute();

		// 		// $result = $stmt->get_result();
		// 		// $row = $result->fetch_assoc();
				

		// 		$result = $stmt->get_result();
		// 		// $row = $result->fetch_assoc();
		// 		return  $result;
				
		// }






}










?>