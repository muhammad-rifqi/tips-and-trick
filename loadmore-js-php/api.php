<?php

    header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Credentials: true");
	header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
	header("Content-Type: application/json; charset=utf-8");
	
	$get = json_decode(file_get_contents("php://input"),true);
	$koneksi = mysqli_connect("localhost","root","","db_toko_online");

	$sql = mysqli_query($koneksi,"select * from produk limit ".$get['limit']."");
	$check = mysqli_num_rows($sql);
		if($check > 0){
			$row = array();
			while($data = mysqli_fetch_assoc($sql)){
				$row[] = $data;
			}
			echo json_encode($row);	
		}else{
			http_response_code(403);
			exit();
		}
?>