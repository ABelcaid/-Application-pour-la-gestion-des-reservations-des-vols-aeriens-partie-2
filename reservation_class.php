<?php
// include('dbconnection.php');


 class Reservation{

		function __construct() {
			$this->conn = new mysqli("localhost","root","belcaid","gestion_reservations");
		}

		function reservation_insert($id,$latest_id,$id_user,$date) {	


            $stmt =$this->conn->prepare("INSERT Into reservation (vol_id,passager_id,id_user,date_reservation) values(?,?,?,?)");
			$stmt->bind_param("iiis", $id,$latest_id,$id_user,$date);
            $stmt->execute();
            $latest_id_reservation = $this->conn->insert_id; 
            return $latest_id_reservation;
		}
		
		
		
		function reservation_show_id($id) {

			$query = "SELECT * from reservation where id='$id'";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			return  $result;
				
		}













}










?>