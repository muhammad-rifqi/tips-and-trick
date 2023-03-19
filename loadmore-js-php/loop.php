<?php

    error_reporting(0);
	
	if(empty($_GET['halaman'])){
		$data = file_get_contents('http://localhost/testing-disini/trik/api_paging.php');
	}else{
		$data = file_get_contents('http://localhost/testing-disini/trik/api_paging.php?halaman='.$_GET['halaman']);
	}
	$array = json_decode($data,true);

	for($i=0;$i<count($array);$i++){
		echo "<p>".$array[$i]['id_produk']."/".$array[$i]['nama_produk']."</p>";
	}

	$total = 9;
	for($i=1;$i<=$total;$i++){
		if ((($i >= $_GET['halaman'] - 3) && ($i <= $_GET['halaman'] + 3)) || ($i == 1) || ($i == $total)){
			echo "<a href='?halaman=".$i."'>".$i."</a> | ";
		}
	}

?>