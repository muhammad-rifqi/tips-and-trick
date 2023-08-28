<?php
$koneksi = mysqli_connect("localhost","root","","test");
if($koneksi){
    $row = array();
    $sql = mysqli_query($koneksi,"select * from user where username LIKE '%".$_GET['q']."%'");
    while($data = mysqli_fetch_array($sql)){
        $row[] = $data;
    }
    echo json_encode(array("status"=>true, "data"=> $row));
}else{
    echo json_encode(array("status"=>false, "data"=> []));
}


?>