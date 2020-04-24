<?php
date_default_timezone_set("Asia/Jakarta");
include "connect.php";

$dataUrl = $_POST['img']; 
$id = $_POST['id']; 
$nama = $_POST['nama']; 

$dataUrlParts = explode( ",", $dataUrl);
$data = base64_decode($dataUrlParts[1]);
if ($id=="" or $nama==""){
    echo "ID dan Nama tidak boleh kosong";die;  
}

$query4 = "select * from t_karyawan where id='$id'";
$result4 = $koneksi->query($query4);
$row4 = mysqli_num_rows($result4);

if ($row4==1){
    echo "ID Telah digunakan";die;  
}

include("Kairos.php");

$app_id = "7c3fc6ca";
$app_key = "1851e2cc9e3aba6cf0a8af4d054c6c7a";

$kairos = new Kairos($app_id, $app_key);

//Koding enroll()
$image      = $dataUrl;
$subject_id = $id;
$gallery_name = 'karyawan';
$argumentArray =  array(
  "image" => $image,
  "subject_id" => $subject_id,
  "gallery_name" => $gallery_name
);
$response   = $kairos->enroll($argumentArray);

$cek = explode('"', $response);

if(in_array("Errors", $cek) or empty($response)) {
    $info = "";
    if(in_array("no faces found in the image", $cek)) {
        $info = "Wajah Tidak di Temukan";
    }
    
    echo "<br>Terjadi Kesalahan ".$info.", Silakan Coba Kembali";
} else {
    $query = "insert into t_karyawan values ('$id','$nama')";
    $result = $koneksi->query($query);
    if($result){
        echo "Data Karyawan Berhasil Ditambahkan";
    }else{
        echo "Data Karyawan Gagal Ditambahkan";
    }
}

//$isi = explode(",", $response);
//$isi2 = explode('"', $isi[4]);

//echo '<br>Selamat Datang '.$isi2[3];
// print_r($response);
/**/
?>