<?php
$koneksi = mysqli_connect("localhost","root","","survei");
if($koneksi){
    $row = array();
    $name = $_POST['name'];
    $query = mysqli_query($koneksi,"select * from pertanyaan where soal LIKE '%".$name."%'");
    if(mysqli_num_rows($query) > 0){
            while($data = mysqli_fetch_assoc($query)){
                $row[] = $data; 
            }
        echo json_encode($row);
        http_response_code(200);
        exit();
    }else{
        echo json_encode([]);
        http_response_code(200);
        exit();
    }
}else{
   header('Content-type: application/json');
   mysqli_error($koneksi);
   http_response_code(500);
   exit();
}

?>