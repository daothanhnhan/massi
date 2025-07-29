<?php

// include_once("../lib/library.php");
include_once "../functions/library.php";
/**
* 
*/
class action_admin extends library
{
	


	public function countTotalOrderCart(){
		global $conn_vn;
		$sql = "SELECT * FROM cart";
		$result = mysqli_query($conn_vn, $sql);
		$total = mysqli_num_rows($result);
		if ($total < 10) {
			return "0".$total;
		}
		return $total;
	}

	public function countTotalCustomer(){

	}

	public function countTotalProducts(){
		global $conn_vn;
		$sql = "SELECT * FROM product";
		$result = mysqli_query($conn_vn, $sql);
		$total = mysqli_num_rows($result);
		if ($total < 10) {
			return "0".$total;
		}
		return $total;
	}

	public function countTotalNews(){
		global $conn_vn;
		$sql = "SELECT * from news";
		$result = mysqli_query($conn_vn, $sql);
		$total = mysqli_num_rows($result);
		if ($total < 10) {
			return "0".$total;
		}
		return $total;
	}

}
?>